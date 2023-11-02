<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->integer('tarif_terpasang');
            $table->foreignId('season_id')->references('id')->on('seasons')->onDelete('cascade');
            // $table->foreignId('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
            //$table->unsignedBigInteger('season_id')->nullable();
            //$table->foreign('season_id')->references('id')->on('seasons');
            // $table->unsignedBigInteger('kamar_id');
            $table->timestamps();

            // $table->foreign('season_id')->references('id')->on('seasons');
            // $table->foreign('kamar_id')->references('id')->on('kamars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifs');
    }
};