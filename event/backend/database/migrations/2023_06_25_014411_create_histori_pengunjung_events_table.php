<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriPengunjungEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_pengunjung_event', function (Blueprint $table) {
            $table->id();
            $table->string('tiket_pengunjung');
            $table->bigInteger('id_event')->unsigned()->index();
            $table->timestamps();

            $table->foreign('id_event')
            ->references('id_event')->on('events')
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
        Schema::dropIfExists('histori_pengunjung_events');
    }
}
