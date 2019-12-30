<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propierties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inventory_number');
            $table->string('propierty_location');
            $table->string('ext_number');
            $table->string('int_number');
            $table->float('surface');
            $table->float('book_value');
            $table->string('accounting_item');
            $table->string('notary_minutes');
            $table->string('rpp');
            $table->string('current_situation');
            $table->string('notary');
            $table->date('document_date');
            $table->string('document_number');
            $table->string('propierty_account');
            $table->string('catastral_key');
            $table->string('utm_coordinates');
            $table->string('government_session');
            $table->string('owner_name');
            $table->string('observations');
            $table->integer('propierty_description_id')->unsigned()->nullable();
            $table->integer('use_type_id')->unsigned()->nullable();
            $table->integer('adquisition_shape_id')->unsigned()->nullable();
            $table->integer('support_document_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propierties');
    }
}
