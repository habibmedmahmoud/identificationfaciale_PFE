@component('mail::message')
# Hewiya

Cliquer sur le boutton pour passer au l'etape de verification 

<a class="btn btn-primary" href="{{ route('verify_token',$maildata['token']) }}">Verifier</a>

Merci,<br>
{{ config('app.name') }}
@endcomponent
