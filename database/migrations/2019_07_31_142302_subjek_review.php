<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjekReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjek_review', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('ticket_code', 10)->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone')->numeric();
            $table->string('anggota1')->nullable();
            $table->string('anggota2')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('subjek_review');
    }
}
