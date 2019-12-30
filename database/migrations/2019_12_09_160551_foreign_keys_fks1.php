<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeysFks1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('propierties', function(Blueprint $table){
        $table->foreign('propierty_description_id')->references('id')->on('propierties_description')->onUpdate('cascade')->onDelete('set null');
        $table->foreign('use_type_id')->references('id')->on('use_types')->onUpdate('cascade')->onDelete('set null');
        $table->foreign('adquisition_shape_id')->references('id')->on('adquisition_shapes')->onUpdate('cascade')->onDelete('set null');
        $table->foreign('support_document_id')->references('id')->on('support_documents')->onUpdate('cascade')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('propierties', function(Blueprint $table){
        $table->dropForeign(['propierty_description_id']);
        $table->dropForeign(['use_type_id']);
        $table->dropForeign(['adquisition_shape_id']);
        $table->dropForeign(['support_document_id']);
      });
    }
}
