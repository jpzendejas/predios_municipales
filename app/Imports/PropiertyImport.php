<?php

namespace App\Imports;

use App\Propierty;
use Maatwebsite\Excel\Concerns\ToModel;

class PropiertyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
          // dd($row[1]);
          return new Propierty([
          'inventory_number'=>$row[0],
          'propierty_description_id'=>$row[1],
          'propierty_location' => $row[2],
          'surface' => $row[3],
          'use_type_id' => $row[4],
          'book_value'=> $row[5],
          'accounting_item' => $row[6],
          'rpp' => $row[7],
          'adquisition_shape_id' => $row[8],
          'notary' => $row[9],
          'document_date' => $row[10],
          'document_number' => $row[11],
          'support_document_id' => $row[12],
          'propierty_account' => $row[13],
          'catastral_key'=> $row[14],
          'government_session' => $row[15],
          'owner_id' => $row[16],
          'observations' => $row[17],
      ]);

    }
}
