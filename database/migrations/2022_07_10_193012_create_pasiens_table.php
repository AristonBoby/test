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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_Rm',50)->unique();
            $table->string('nama',50);
            $table->string('tempat_Lahir',25);
            $table->date('tanggal_Lahir');
            $table->string('kepala_keluarga',50);
            $table->string('jenkel',1);
            $table->string('agama',8);
            $table->string('pekerjaan',15);
            $table->string('nik',16);
            $table->string('bpjs',13);
            $table->string('alamat',150);
            $table->string('id_user');
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
        Schema::dropIfExists('pasiens');
    }
};
