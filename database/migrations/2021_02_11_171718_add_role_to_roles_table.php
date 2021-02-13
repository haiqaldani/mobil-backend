<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRoleToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            DB::table('roles')->insert(
                array(
                    'role' => 'Administrator',
                    'updated_at' => '2021-02-12 00:28:51',
                    'created_at' => '2021-02-12 00:28:51'
                )
            );
            DB::table('roles')->insert(
                array(
                    'role' => 'Operator',
                    'updated_at' => '2021-02-12 00:28:51',
                    'created_at' => '2021-02-12 00:28:51'
                )
            );
            DB::table('roles')->insert(
                array(
                    'role' => 'Seller',
                    'updated_at' => '2021-02-12 00:28:51',
                    'created_at' => '2021-02-12 00:28:51'
                )
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
}
