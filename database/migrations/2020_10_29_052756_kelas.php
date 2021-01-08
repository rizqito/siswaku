<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kelas extends Migration
{
    public function up()
    {
        Schema::create('kelas', function(Blueprint $table){
            $table->increments('id');
            $table->string('nama_kelas',20);            
            $table->timestamps();            
        });

        Schema::table('siswa', function(Blueprint $table){
            $table->foreign('id_kelas')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('siswa', function(Blueprint $table){
            $table->dropForeign('siswa_id_kelas_foreign');
        });

        Schema::dropIfExist('kelas');
    }
}
