<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_rohis')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('tanggal_lahir')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('id_sekolah')->nullable();
            $table->string('kelas')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('kategori_daftar')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status')->nullable();
            $table->integer('no_wa')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
