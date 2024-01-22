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
        Schema::create('users_competencias', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('competencia_id');
            $table->unsignedBigInteger('docente_validador');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('competencia_id')->references('id')->on('competencias');
            $table->foreign('docente_validador')->references('id')->on('users');
            $table->primary(array('user_id', 'competencia_id'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('competencia_id');
            $table->dropForeign('docente_validador');
            $table->dropColumn('user_id');
            $table->dropColumn('competencia_id');
            $table->dropColumn('docente_validador');
        });
    }
};