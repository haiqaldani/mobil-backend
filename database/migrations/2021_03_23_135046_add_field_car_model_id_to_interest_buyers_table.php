<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldCarModelIdToInterestBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interest_buyers', function (Blueprint $table) {
            $table->bigInteger('car_model_id')->nullable();
            $table->bigInteger('car_variant_id')->nullable();
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
            $table->dropColumn('car_model_id');
            $table->dropColumn('car_variant_id');

        });
    }
}
