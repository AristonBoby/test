<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antropometris', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('id_skrining')->unsigned();
            $table->char('sistole',3)->nullable();
            $table->char('diastole',3)->nullable();
            $table->char('tinggi_badan',3)->nullable();
            $table->char('berat_badan',3)->nullable();
            $table->char('lingkar_perut',3)->nullable();
            $table->char('glukosa',3)->nullable();
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_skrining')->references('id')->on('skriningPtms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antropometris');
    }
};
