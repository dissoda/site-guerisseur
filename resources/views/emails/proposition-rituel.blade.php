<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <p>{{ __('emails.proposition_rituel.salutation', ['nom' => $client->nom]) }}</p>

    <p>{{ __('emails.proposition_rituel.intro') }}</p>

    @if($description)
        <h3>{{ __('emails.proposition_rituel.description_titre') }}</h3>
        <p>{{ $description }}</p>
    @endif

    <h3>{{ __('emails.proposition_rituel.ingredients_titre') }}</h3>
    <table style="border-collapse: collapse; width: 100%; max-width: 500px;">
        @foreach($ingredients as $ingredient)
            <tr>
                <td style="padding: 6px 12px 6px 0; border-bottom: 1px solid #eee;">
                    {{ $ingredient['designation'] }} (x{{ $ingredient['quantite'] }})
                </td>
                <td style="padding: 6px 0; border-bottom: 1px solid #eee; text-align: right;">
                    {{ number_format($ingredient['prix'] * $ingredient['quantite'], 2) }} FCFA
                </td>
            </tr>
        @endforeach
        <tr>
            <td style="padding: 10px 12px 0 0; font-weight: bold;">
                {{ __('emails.proposition_rituel.total') }}
            </td>
            <td style="padding: 10px 0 0 0; font-weight: bold; text-align: right;">
                {{ number_format($rituelPrescrit->montant_total, 2) }} FCFA
            </td>
        </tr>
    </table>

    @if($coordonneesPaiement)
        <h3>{{ __('emails.proposition_rituel.paiement_titre') }}</h3>
        <p>{{ __('emails.proposition_rituel.paiement_intro') }}</p>
        <p style="background: #f5f5f5; padding: 12px; border-radius: 4px;">{{ $coordonneesPaiement }}</p>
    @endif

    <p>
        {{ __('emails.proposition_rituel.suivi_intro') }}<br>
        <a href="{{ url('/suivi/' . $dossier->token) }}">{{ url('/suivi/' . $dossier->token) }}</a>
    </p>

    <p>{{ __('emails.proposition_rituel.signature') }}</p>

</body>
</html>