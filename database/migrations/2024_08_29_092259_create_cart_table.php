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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  //menandakan sebuah id user dari laravel
            $table->unsignedBigInteger('barang_id');  //buku yang mau dipessan
            $table->string('quantity');             //jumlah buku yang mau dipesan
            $table->string('Almt_Pengiriman');
            $table->unsignedBigInteger('Kode_pos');


            $table->foreign('user_id')->references('id')->on('users'); //foreign key ditarik untuk menghubungkan semua data
            $table->foreign('barang_id')->references('id')->on('barangs');
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
        Schema::dropIfExists('cart');
    }
};
