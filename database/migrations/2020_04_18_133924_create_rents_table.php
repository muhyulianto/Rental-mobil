<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_mobil');
            $table->unsignedBigInteger('id_armada')->nullable();
            $table->unsignedBigInteger('id_driver')->nullable();
            $table->integer('tipe_peminjaman');
            $table->date('mulai_sewa');
            $table->integer('lama_sewa');
            $table->date('habis_sewa');
            $table->string('lokasi_penjemputan')->nullable();
            $table->enum('status', ['pending', 'jalan', 'kembali'])->default('pending');
            $table->integer('denda')->default(0);
            $table->timestamps();

            // Relationship
            $table->foreign('id_customer')->references('id')
            ->on('customers')->onDelete('cascade');
            $table->foreign('id_mobil')->references('id')
            ->on('cars')->onDelete('cascade');
            $table->foreign('id_armada')->references('id')
            ->on('armadas')->onDelete('cascade');
            $table->foreign('id_driver')->references('id')
            ->on('drivers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
