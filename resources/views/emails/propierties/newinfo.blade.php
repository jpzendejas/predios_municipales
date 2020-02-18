@component('mail::message')
# Propiedades Municipales

Nuevos datos registrados.

<ul>
<li><strong>Numero de Inventario: </strong>{{$propierty['inventory_number'] ?? 'N/A'}}.</li>
<li><strong>Ubicación: </strong>{{$propierty['propierty_location'] ?? 'N/A'}}.</li>
<li><strong>Numero Exterior: </strong>{{$propierty['ext_number'] ?? 'N/A'}}.</li>
<li><strong>Numero Interior: </strong>{{$propierty['int_number'] ?? 'N/A'}}</li>
<li><strong>Superficie: </strong>{{$propierty['surface'] ?? 'N/A'}}.</li>
<li><strong>Valor Contable: </strong>{{$propierty['book_value'] ?? 'N/A'}}.</li>
<li><strong>Partida Contable: </strong>{{$propierty['accounting_item'] ?? 'N/A'}}.</li>
<li><strong>Acta Notarial: </strong>{{$propierty['notary_minutes'] ?? 'N/A'}}.</li>
<li><strong>RPP: </strong>{{$propierty['rpp'] ?? 'N/A'}}.</li>
<li><strong>Situación Actual: </strong>{{$propierty['current_situation'] ?? 'N/A'}}.</li>
<li><strong>Notario: </strong>{{$propierty['notary'] ?? 'N/A'}}.</li>
<li><strong>Fecha Escritura: </strong>{{$propierty['document_date'] ?? 'N/A'}}.</li>
<li><strong>Cuenta Predial: </strong>{{$propierty['propierty_account'] ?? 'N/A'}}.</li>
<li><strong>Clave Catastral: </strong>{{$propierty['catastral_key'] ?? 'N/A'}}.</li>
<li><strong>Coordenadas UTM: </strong>{{$propierty['utm_coordinates'] ?? 'N/A'}}.</li>
<li><strong>Sesión de Ayuntamiento: </strong>{{$propierty['government_session'] ?? 'N/A'}}.</li>
<li><strong>Propietario: </strong>
{{$propierty->owner->owner_name ?? 'N/A'}}.
</li>
<li><strong>Descripción: </strong>
{{$propierty->propierty_description->propierty_description ?? 'N/A'}}.
</li>
<li><strong>Tipo de Uso : </strong>
  {{$propierty->use_type->use_type ?? 'N/A'}}.
</li>
<li><strong>Forma de Adquisición: </strong>
    {{$propierty->adquisition_shape->adquisition_shape ?? 'N/A'}}.
</li>
<li><strong>Documento Soporte: </strong>{{$propierty->support_document->support_document ?? 'N/A'}}.</li>
</ul>
<li><strong>Observaciones: </strong>{{$propierty['observations']}}.</li>
</ul>

@component('mail::button', ['url' => 'http://salamanca.gob.mx/predios_municipales'])
Predios Municipales
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
