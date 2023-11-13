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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kamar');
            $table->string('tipe_tempat_tidur');
            $table->integer('tarif_awal');
            $table->integer('ukuran_kamar');
            $table->integer('kapasitas_kamar');
            $table->string('rincian_kamar');
            $table->string('detail_kamar');
            $table->foreignId('tarif_id')->references('id')->on('tarifs')->onDelete('cascade');
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
        Schema::dropIfExists('kamars');
    }
};