<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageFieldToPromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->text('image');
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('slug');
        });
    }
}
