<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_area', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_event')->unsigned()->nullable(true)->index();
            $table->bigInteger('id_area')->unsigned()->nullable(true)->index();
            $table->string('keterangan')->nullable(true);
            $table->timestamps();

            $table->foreign('id_event')
            ->references('id_event')->on('events')
            ->onDelete('cascade');

            $table->foreign('id_area')
            ->references('id_area')->on('areas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_areas');
    }
}
