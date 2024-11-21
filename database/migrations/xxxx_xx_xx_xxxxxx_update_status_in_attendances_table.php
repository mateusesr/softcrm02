<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateStatusInAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('attendances')
            ->where('status', 1)
            ->update(['status' => 'Pendente']);

        DB::table('attendances')
            ->where('status', 2)
            ->update(['status' => 'Urgente']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::table('attendances')
            ->where('status', 'Pendente')
            ->update(['status' => 1]);

        DB::table('attendances')
            ->where('status', 'Urgente')
            ->update(['status' => 2]);
    }
}
