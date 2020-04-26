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
<strong>Estimado equipo, tenemos la siguiente solicitud de atención para el programa "MET"</strong>
<legend></legend>
<table style="border-collapse: collapse; width: 100%;">
    <tr>
        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Estado:</th>
        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
            @if($paciente->activo == true)
                Activo
            @else
                Inactivo
            @endif
        </td>
    </tr>

    <tr>
        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Nombre de beneficiario:</th>
        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $paciente->nombre }}</td>
    </tr>

    <tr>
        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Rut:</th>
        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $paciente->rut }}</td>
    </tr>

    <tr>
        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Correo electrónico:</th>
        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $paciente->email }}</td>
    </tr>
    <tr>
        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Número de teléfono:</th>
        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $paciente->telefono }}</td>
    </tr>
    <tr>
        <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Motivo de consulta:</th>
        <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $paciente->motivo_consulta }}</td>
    </tr>        
</table>

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

