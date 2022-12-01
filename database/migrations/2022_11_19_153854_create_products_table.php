<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_categories_id');
            $table->foreignId('product_scenario_id');
            $table->string('judul');
            $table->string('ukuran_tanah');
            $table->integer('luas_bangunan');
            $table->integer('jumlah_kamar_tidur');
            $table->integer('jumlah_kamar_mandi');
            $table->integer('jumlah_toilet_tamu');
            $table->integer('jumlah_maid_room');
            $table->integer('jumlah_mobil_ditampung');
            $table->integer('jumlah_lantai');
            $table->string('fee_desain');
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
        Schema::dropIfExists('products');
    }
};
