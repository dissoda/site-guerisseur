<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <p>{{ __('emails.retrouver_suivi.salutation', ['nom' => $client->nom]) }}</p>

    @if($dossiers->isEmpty())
        <p>{{ __('emails.retrouver_suivi.aucun_dossier') }}</p>
    @else
        <p>{{ __('emails.retrouver_suivi.intro') }}</p>

        <ul>
            @foreach($dossiers as $dossier)
                <li style="margin-bottom: 8px;">
                    <a href="{{ url('/suivi/' . $dossier->token) }}">{{ url('/suivi/' . $dossier->token) }}</a>
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>