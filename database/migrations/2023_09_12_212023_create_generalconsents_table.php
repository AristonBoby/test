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
        Schema::create('generalconsents', function (Blueprint $table) {
            $table->id();
            $table->string('nama',25);
            $table->char('status',25);
            $table->char('jenkel',1);
            $table->string('alamat',100);
            $table->char('notlpn',12);
            $table->bigInteger('id_pasien')->unsigned()->unique();
            $table->timestamps();
            $table->foreign('id_pasien')->references('id')->on('pasiens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generalconsents');
    }
};
