<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuspendedReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspended_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id')->unsigned()->unique();
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');

            //all these attributes are adding redundantly due to performance:
            $table->dateTime('time');

            // on delete conditions are inherited hierarchically, there's no need to implicit specification
            $table->string('infuencer_instagram_token');
            $table->string('business_instagram_username');

            //these columns can add later to the table base on our conclusive policy:
            //integer(max_hour)
            //string valid_medias

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
        Schema::dropIfExists('suspended_reservations');
    }
}
