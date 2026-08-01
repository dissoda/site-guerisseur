<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">

    <p>{{ __('emails.mise_a_jour.salutation', ['nom' => $client->nom]) }}</p>

    @if($texteMessage)
        <p>{{ $texteMessage }}</p>
    @endif

    @if(count($images) > 0)
        @foreach($images as $image)
            <p><img src="{{ asset('storage/' . $image) }}" alt="" style="max-width: 100%; border-radius: 6px;"></p>
        @endforeach
    @endif

    <p>
        {{ __('emails.mise_a_jour.suivi_intro') }}<br>
        <a href="{{ url('/suivi/' . $dossier->token) }}">{{ url('/suivi/' . $dossier->token) }}</a>
    </p>

</body>
</html>