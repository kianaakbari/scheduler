<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('offer_id')->unsigned()->nullable();
            $table->integer('discount_id')->unsigned()->nullable();
            $table->integer('one')->default(0);
            $table->integer('two')->default(0);
            $table->integer('three')->default(0);
            $table->integer('four')->default(0);
            $table->integer('five')->default(0);
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
        Schema::dropIfExists('votes');
    }
}
