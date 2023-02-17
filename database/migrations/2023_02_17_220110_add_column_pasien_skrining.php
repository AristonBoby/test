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
        Schema::table('pasiens', function (Blueprint $table){
            $table->char('skrining',1)->default(0)->after('id_user');
            $table->char('dm',1)->default(0)->after('skrining');
            $table->char('ht',1)->default(0)->after('dm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasiens', function (Blueprint $table){
            $table->dropColumn('skrining');
            $table->dropColumn('dm');
            $table->dropColumn('ht');
        });
    }
};
