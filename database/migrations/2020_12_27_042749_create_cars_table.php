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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->year('car_year');
            $table->integer('car_types_id');
            $table->enum('transmission', array('Otomatis', 'Manual'));
            $table->string('fuel');
            $table->string('edition');
            $table->integer('cc');
            $table->integer('kilometers');
            $table->integer('price');
            $table->text('price_description');
            $table->string('color');
            $table->string('vehicle_features');
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
