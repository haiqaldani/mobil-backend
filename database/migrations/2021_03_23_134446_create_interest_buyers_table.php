<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_buyers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('city');
            $table->enum('payment', ['Kredit', 'Tunai']);
            $table->timestamp('schedule');
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
        Schema::dropIfExists('interest_buyers');
    }
}
