@component('mail::message')
# {{$artigo->titulo}}

{{$artigo->resumo}}.

@component('mail::button', ['url' => $url])
Ler mais
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
