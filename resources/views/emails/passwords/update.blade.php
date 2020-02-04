@component('mail::message')
<center>
#Actualización de Contraseña
Siga por favor el siguientye enlace para actualizar sus datos.
</center>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/update_password'])
Actualizar Contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
