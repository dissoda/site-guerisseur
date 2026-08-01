<?php

namespace App\Services;

use DeepL\DeepLClient;
use Illuminate\Database\Eloquent\Model;

class Traducteur
{
    protected DeepLClient $client;

    // Les 5 langues gérées par le site, comme convenu
    public const LANGUES_DISPONIBLES = ['fr', 'en', 'it', 'de', 'pl'];

    public function __construct()
    {
        $this->client = new DeepLClient(config('services.deepl.key'));
    }

    /**
     * Traduit un texte d'une langue vers une autre via DeepL.
     */
    public function traduire(string $texte, string $langueSource, string $langueCible): string
    {
        if (trim($texte) === '') {
            return '';
        }

        $codeCible = $this->codeDeepL($langueCible);

        $resultat = $this->client->translateText($texte, strtoupper($langueSource), $codeCible);

        return $resultat->text;
    }

    /**
     * DeepL exige des codes régionaux précis pour certaines langues cibles
     * (ex: "EN-GB" plutôt que "EN"). On centralise cette conversion ici.
     */
    protected function codeDeepL(string $langue): string
    {
        return match ($langue) {
            'en' => 'en-GB',
            default => strtoupper($langue),
        };
    }

    /**
     * Remplit automatiquement les traductions manquantes d'un modèle
     * traduisible (Service, Publication...), sans écraser celles déjà
     * saisies manuellement. Sauvegarde après chaque traduction obtenue,
     * pour ne rien perdre si un appel échoue en cours de route.
     */
    public function traduireChampsManquants(Model $modele, array $champs, string $langueSource): void
    {
        // Les appels à DeepL peuvent prendre du temps cumulés : on donne
        // plus de marge que les 30 secondes par défaut de PHP.
        set_time_limit(120);

        foreach ($champs as $champ) {
            $texteSource = $modele->getTranslation($champ, $langueSource, false);

            if (blank($texteSource)) {
                continue;
            }

            foreach (self::LANGUES_DISPONIBLES as $langueCible) {
                if ($langueCible === $langueSource) {
                    continue;
                }

                $dejaTraduit = $modele->getTranslation($champ, $langueCible, false);

                if (filled($dejaTraduit)) {
                    continue; // on ne touche pas à une traduction déjà présente
                }

                $traduction = $this->traduire($texteSource, $langueSource, $langueCible);
                $modele->setTranslation($champ, $langueCible, $traduction);
                $modele->save();
            }
        }
    }
}