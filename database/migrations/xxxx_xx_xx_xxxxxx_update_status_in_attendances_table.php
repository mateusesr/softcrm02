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
        // Atualiza os valores do status
        DB::table('attendances')
            ->where('status', 1) // Ativo
            ->update(['status' => 'Pendente']);

        DB::table('attendances')
            ->where('status', 2) // Em Espera
            ->update(['status' => 'Urgente']);

        // O status 3 (Finalizado) permanece inalterado
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Reverte os valores do status para os antigos
        DB::table('attendances')
            ->where('status', 'Pendente')
            ->update(['status' => 1]);

        DB::table('attendances')
            ->where('status', 'Urgente')
            ->update(['status' => 2]);

        // O status 3 (Finalizado) permanece inalterado
    }
}
