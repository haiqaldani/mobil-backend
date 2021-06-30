<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropNameFieldToInterestBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interest_buyers', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('phone_number');
            $table->dropColumn('city');
            $table->string('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interest_buyers', function (Blueprint $table) {
            $table->string('name');
            $table->string('phone_number');
            $table->string('city');
            $table->dropColumn('user_id');
        });
    }
}
