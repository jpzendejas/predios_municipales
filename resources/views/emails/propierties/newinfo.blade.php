@component('mail::message')
# Propiedades Municipales

Nuevos datos registrados.

<ul>
<li><strong>Numero de Inventario: </strong>{{$propierty['inventory_number']}}.</li>
<li><strong>Ubicación: </strong>{{$propierty['$propierty_location']}}.</li>
<li><strong>Numero Exterior: </strong>{{$propierty['ext_number']}}.</li>
<li><strong>Numero Interior: </strong>${{$propierty['int_number']}}</li>
<li><strong>Superficie: </strong>{{$propierty['surface']}}.</li>
<li><strong>Valor Contable: </strong>{{$propierty['book_value']}}.</li>
<li><strong>Partida Contable: </strong>{{$propierty['accounting_item']}}.</li>
<li><strong>Acta Notarial: </strong>{{$propierty['notary_minutes']}}.</li>
<li><strong>RPP: </strong>{{$propierty['rpp']}}.</li>
<li><strong>Situación Actual: </strong>{{$propierty['current_situation']}}.</li>
<li><strong>Notario: </strong>{{$propierty['notary']}}.</li>
<li><strong>Fecha Escritura: </strong>{{$propierty['document_date']}}.</li>
<li><strong>Cuenta Predial: </strong>{{$propierty['propierty_account']}}.</li>
<li><strong>Clave Catastral: </strong>{{$propierty['catastral_key']}}.</li>
<li><strong>Coordenadas UTM: </strong>{{$propierty['utm_coordinates']}}.</li>
<li><strong>Sesión de Ayuntamiento: </strong>{{$propierty['government_session']}}.</li>
<li><strong>Propietario: </strong>{{$propierty->owner->owner_name}}.</li>
<li><strong>Descripción: </strong>{{$propierty->propierty_description->propierty_description}}.</li>
<li><strong>Tipo de Uso : </strong>{{$propierty->use_type->use_type}}.</li>
<li><strong>Forma de Adquisición: </strong>{{$propierty->adquisition_shape->adquisition_shape}}.</li>
<li><strong>Documento Soporte: </strong>{{$propierty->support_document->support_document}}.</li>
<li><strong>Observaciones: </strong>{{$propierty['observations']}}.</li>
</ul>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
