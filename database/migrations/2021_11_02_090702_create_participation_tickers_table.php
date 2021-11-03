<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipationTickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participation_tickers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
                $table->foreign('user_id')
                        ->references('id')
                        ->on('app__users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->unsignedInteger('meet_id');
                $table->foreign('meet_id')
                        ->references('id')
                        ->on('meet_rooms')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->boolean('status');
            $table->dateTime('book_date');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
        Schema::dropIfExists('participation_tickers');
    }
}
