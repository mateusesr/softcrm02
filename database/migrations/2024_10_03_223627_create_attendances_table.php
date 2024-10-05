<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("client_id");
            $table->unsignedBigInteger("type_id");
            $table->text("description");
            $table->text("solution");
            $table->enum("status",["waiting","in_progress","finished","canceled"]);
            $table->timestamps();

            $table->foreign('client_id')->references("id")->on("clients");
            $table->foreign('type_id')->references("id")->on("types");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
