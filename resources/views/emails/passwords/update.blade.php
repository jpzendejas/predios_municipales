@component('mail::message')
# Actualización de Contraseña
Actualiza tu contraseña para accesar al sistema.
@component('mail::button', ['url' => 'http://salamanca.gob.mx/predios_municipales/public/update_password'])
Actualizar Contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
