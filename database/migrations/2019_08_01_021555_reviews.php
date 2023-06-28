<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('kerapihan');
            $table->string('desc_kerapihan')->nullable();
            $table->integer('keramahan');
            $table->string('desc_keramahan')->nullable();
            $table->integer('efisiensi');
            $table->string('desc_efisiensi')->nullable();
            $table->integer('kepuasan');
            $table->string('desc_kepuasan')->nullable();;
            $table->string('kritik_saran');
            $table->unsignedBigInteger('subjek_id')->nullable();
            $table->foreign('subjek_id')->references('id')->on('subjek_review');
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
        Schema::dropIfExists('reviews');
    }
}
