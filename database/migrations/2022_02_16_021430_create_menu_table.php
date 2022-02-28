<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('tb_menu', function (Blueprint $table){
            $table->id();
            $table->string('nama_menu');
            $table->integer('harga');
            $table->text('deskripsi');
            $table->integer('ketersediaan');
            $table->timestamps();
        });
    }
}
