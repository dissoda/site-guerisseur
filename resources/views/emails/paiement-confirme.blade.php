<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <p>{{ __('emails.paiement_confirme.salutation', ['nom' => $client->nom]) }}</p>

    <p>{{ __('emails.paiement_confirme.intro') }}</p>

    <p>{{ __('emails.paiement_confirme.rituel_en_cours') }}</p>

    <table style="border-collapse: collapse; margin: 20px 0;">
        <tr>
            <td style="padding: 4px 12px 4px 0; color: #666;">{{ __('emails.paiement_confirme.montant') }}</td>
            <td style="padding: 4px 0; font-weight: bold;">{{ number_format($rituelPrescrit->montant_total, 2) }} FCFA</td>
        </tr>
    </table>

    <p>{{ __('emails.paiement_confirme.signature') }}</p>

</body>
</html>