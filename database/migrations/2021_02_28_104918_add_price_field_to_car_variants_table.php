<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceFieldToCarVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_variants', function (Blueprint $table) {
            $table->integer('price');
            $table->string('fuel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_variants', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('fuel');
        });
    }
}
