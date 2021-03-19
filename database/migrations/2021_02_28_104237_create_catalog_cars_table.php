<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_cars', function (Blueprint $table) {
            $table->id();
            $table->integer('merk_id');
            $table->integer('car_model_id');
            $table->integer('car_variant_id');
            $table->integer('color_id');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_cars');
    }
}
