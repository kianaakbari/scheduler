<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description',500)->nullable();
            $table->integer('numbers');
            $table->integer('owner')->unsigned();
            $table->foreign('owner')->references('id')->on('businesses')->onDelete('cascade');
            $table->integer('category');
            $table->integer('escort')->nullable();
            $table->string('escort_conditions',500)->nullable();
            $table->date('start_date');
            $table->date('exp_date');
            $table->integer('reserved')->default(0);
            $table->integer('price');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('picture_url')->nullable();
            $table->integer('rate')->default(0);
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
        Schema::dropIfExists('offers');
    }
}
