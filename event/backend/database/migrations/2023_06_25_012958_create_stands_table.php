<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stands', function (Blueprint $table) {
            $table->id('id_stand');
            $table->string('nama_stand');
            $table->string('deskripsi_stand');
            $table->bigInteger('id_area')->unsigned()->nullable(true)->index();
            $table->string('foto_stand')->nullable(true);
            $table->integer('status_stand');
            $table->string('email');
            $table->timestamps();

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
        Schema::dropIfExists('stands');
    }
}
