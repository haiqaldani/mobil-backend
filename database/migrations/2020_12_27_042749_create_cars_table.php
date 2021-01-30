<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->year('car_year');
            $table->integer('car_types_id');
            $table->enum('transmission', ['Otomatis', 'Manual']);
            $table->enum('fuel', ['Bensin', 'Diesel', 'Hybrid', 'Listrik']);
            $table->string('edition')->nullable();
            $table->integer('cc')->nullable();
            $table->integer('kilometers');
            $table->string('price');
            $table->enum('price_description', ['Siap Pakai', 'Belum termasuk pajak dan lain-lain', 'Nego','Kredit tersedia','SKA Pemerintah RI saja (Form A, Form B, dll)', 'OTR']);
            $table->string('color')->nullable();
            $table->string('vehicle_features', 500)->nullable();
            $table->longText('description');
            $table->text('car_picture');
            $table->softDeletes();
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
        Schema::dropIfExists('cars');
    }
}
