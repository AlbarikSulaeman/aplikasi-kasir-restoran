<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('tb_user', function (Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('username');
            $table->string('password');
            $table->string('role');
            $table->timestamps();
        });
    }
}
