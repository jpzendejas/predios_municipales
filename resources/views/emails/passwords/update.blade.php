@component('mail::message')
# Actualización de Contraseña
Actualiza tu contraseña para accesar al sistema.
@component('mail::button', ['url' => 'http://127.0.0.1:8000/update_password'])
Actualizar Contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
