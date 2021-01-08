<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HobiSiswa extends Migration
{
    public function up()
    {
        Schema::create('hobi_siswa', function(Blueprint $table){            
            $table->integer('id_siswa')->unsigned()->index();
            $table->integer('id_hobi')->unsigned()->index();
            $table->timestamps();            

            $table->primary(['id_siswa','id_hobi']);

            $table->foreign('id_siswa')->references('id')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_hobi')->references('id')->on('hobi')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExist('hobi_siswa');
    }
}
