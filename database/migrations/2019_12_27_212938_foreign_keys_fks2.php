<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeysFks2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propierties', function(Blueprint $table){
          $table->foreign('owner_id')->references('id')->on('owners')->onUpdate('cascade')->onDelete('set null');
        });
        Schema::table('propierty_images', function(Blueprint $table){
          $table->foreign('propierty_id')->references('id')->on('propierties')->onUpdate('cascade')->onDelete('set null');
        });
        Schema::table('propierty_documents', function(Blueprint $table){
          $table->foreign('propierty_id')->references('id')->on('propierties')->onUpdate('cascade')->onDelete('set null');
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
          $table->dropForeign(['owner_id']);
        });
        Schema::table('propierty_images', function(Blueprint $table){
          $table->dropForeign(['propierty_id']);
        });
        Schema::table('propierty_documents', function(Blueprint $table){
          $table->dropForeign(['propierty_id']);
        });
    }
}
