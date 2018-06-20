<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUntaggedReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('untagged_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id')->unsigned()->unique();
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->boolean('isReviewed')->default(0);
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
        Schema::dropIfExists('untagged_reservations');
    }
}
