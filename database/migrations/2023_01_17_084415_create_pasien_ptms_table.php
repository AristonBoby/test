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
        Schema::create('pasien_ptms', function (Blueprint $table) {
            $table->id();
            $table->string('nama',100);
            $table->char('nik',16)->unique()->nullable();
            $table->date('tgl_Lahir');
            $table->char('jenkel',1);
            $table->char('keluarahan',5);
            $table->string('alamat',80);
            $table->char('no_Hp',13);
            $table->char('goldar',13);
            $table->char('status',1);
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
        Schema::dropIfExists('pasien_ptms');
    }
};
