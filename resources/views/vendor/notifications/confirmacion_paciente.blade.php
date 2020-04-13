@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}
<p>Estimada(o) {{$paciente->nombre}}, junto con saludarle y darle la más cordial bienvenida a “Mentalizados en Ti (MET) de Isapres Banmédica y Vida Tres”, le informamos que su solicitud ya ha sido cursada. Dentro de los próximos 30 a 60 minutos será contactada(o) por un psicóloga(o) experta(o) al teléfono de contacto que nos indicó:{{$paciente->telefono}}. Por favor, si este no es el número, indicarnos el correcto a través de esta vía, así como también cualquier inconveniente que pueda presentar.</p>
<br>
<p>Cordialmente,</p>
@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>

<div>Estimada(o) <strong> <span style="font-weight:bold;">{{$paciente->nombre}}</span> </strong>, junto con saludarle y darle la más cordial bienvenida a “Mentalizados en Ti (MET) de Isapres Banmédica y Vida Tres”, le informamos que su solicitud ya ha sido cursada. Dentro de los próximos 30 a 60 minutos será contactada(o) por un psicóloga(o) experta(o) al teléfono de contacto que nos indicó:<strong><span style="font-weight:bold;">{{$paciente->telefono}}</span></strong>. Por favor, si este no es el número, indicarnos el correcto a través de esta vía, así como también cualquier inconveniente que pueda presentar.</div>


@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset



{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
@lang(
    "Si tiene problemas para hacer clic en el botón \":actionText\", copie y pegue la URL\n".
    'en su navegador web: ',
    [
        'actionText' => $actionText
    ]
)
[{{ $actionUrl }}]({!! $actionUrl !!})
@endcomponent
@endisset
@endcomponent

