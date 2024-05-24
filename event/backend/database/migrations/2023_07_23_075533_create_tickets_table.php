<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama');
            $table->bigInteger('id_event')->unsigned()->index();
            $table->integer('jumlah_tiket');
            $table->string('bukti_pembayaran')->nullable(true);
            $table->string('status');
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
        Schema::dropIfExists('tickets');
    }
}
