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
        Schema::table('pasiens', function(Blueprint $table){
            $table->string('no_tlpn',13)->after('bpjs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Pasiens', function(Blueprint $table)
        {
            $table->dropColumn('no_tlpn');
        });
    }
};
