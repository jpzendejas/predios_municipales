<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propierty extends Model
{
    protected $fillable = ['inventory_number','propierty_location','ext_number','int_number','surface','book_value','accounting_item','notary_minutes','rpp','current_situation','notary','document_date','document_number','propierty_account','catastral_key',
    'utm_coordinates','government_session','owner_id','observations','propierty_description_id','use_type_id','adquisition_shape_id','support_document_id'];

    public function propierty_description(){
      return $this->belongsTo('App\PropiertyDescription');
    }

    public function use_type(){
      return $this->belongsTo('App\UseType');
    }
    public function adquisition_shape(){
      return $this->belongsTo('App\AdquisitionShape');
    }

    public function support_document(){
      return $this->belongsTo('App\SupportDocument');
    }

    public function owner(){
      return $this->belongsTo('App\Owner');
    }

}
