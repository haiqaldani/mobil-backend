<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('idcard_number');
            $table->string('address');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
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
        Schema::dropIfExists('pols');
    }
}
