<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTransmissionFieldToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('transmission');
            $table->dropColumn('fuel');
            $table->dropColumn('edition');
            $table->dropColumn('cc');
            $table->dropColumn('price_description');
            $table->dropColumn('model');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->enum('transmission', ['Otomatis', 'Manual']);
            $table->enum('fuel', ['Bensin', 'Diesel', 'Hybrid', 'Listrik']);
            $table->string('edition')->nullable();
            $table->integer('cc')->nullable();
            $table->enum('price_description', ['Siap Pakai', 'Belum termasuk pajak dan lain-lain', 'Nego','Kredit tersedia','SKA Pemerintah RI saja (Form A, Form B, dll)', 'OTR']);
            $table->text('model');
        });
    }
}
