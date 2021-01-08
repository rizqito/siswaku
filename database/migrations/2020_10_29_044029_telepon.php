<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Telepon extends Migration
{
    public function up()
    {
        Schema::create('telepon', function(Blueprint $table){
            $table->integer('id_siswa')->unsigned()->primary('id_siswa');
            $table->string('nomor_telepon')->unique();
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExist('telepon');
    }
}
