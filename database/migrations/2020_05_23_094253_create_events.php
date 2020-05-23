<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('method')->nullable();
            $table->string('referer')->nullable();
            $table->string('visit')->nullable();
            $table->string('body')->nullable();
            $table->string('useragent')->nullable();
            $table->string('auth')->nullable();
            $table->string('result')->nullable();
            $table->string('mark')->nullable();
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
        Schema::dropIfExists('events');
    }
}
