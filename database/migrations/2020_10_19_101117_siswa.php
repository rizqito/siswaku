<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Siswa extends Migration
{    
    public function up()
    {
        Schema::create('siswa', function(Blueprint $table){
            $table->increments('id');
            $table->string('nisn', 4)->unique();
            $table->string('nama_siswa', 30);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->integer('id_kelas')->unsigned();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExist('siswa');
    }
}
