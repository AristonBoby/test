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
        Schema::create('skriningptms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pasien')->index()->unique()->unsigned();
            $table->string('riwayatKeluarga1',25)->nullable();
            $table->string('riwayatKeluarga2',25)->nullable();
            $table->string('riwayatKeluarga3',25)->nullable();
            $table->string('riwayatSendiri1',25)->nullable();
            $table->string('riwayatSendiri2',25)->nullable();
            $table->string('riwayatSendiri3',25)->nullable();
            $table->string('merokok',25)->nullable();
            $table->string('aktifitasFisik',25)->nullable();
            $table->string('gula',25)->nullable();
            $table->string('garam',25)->nullable();
            $table->string('lemak',25)->nullable();
            $table->string('sayur',25)->nullable();
            $table->string('alkohol',25)->nullable();
            $table->string('diagnosis1',25)->nullable();
            $table->string('diagnosis2',25)->nullable();
            $table->string('diagnosis3',25)->nullable();
            $table->string('terapiFarmakologi',25)->nullable();
            $table->string('konseling',25)->nullable();
            $table->string('hasilIva',25)->nullable();
            $table->string('tindakLanjutIva',25)->nullable();
            $table->string('hasilSadanis',25)->nullable();
            $table->string('tidakLanjutSadanis',25)->nullable();
            $table->string('konselingUbm',25)->nullable();
            $table->string('car',25)->nullable();
            $table->string('ubm',25)->nullable();
            $table->string('kondisi',25)->nullable();
            $table->timestamps();
            $table->foreign('id_pasien')->references('id')
              ->on('pasiens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skriningptms');
    }
};
