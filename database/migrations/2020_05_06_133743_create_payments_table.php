<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_peminjaman');
            $table->string('id_customer');
            $table->string('nomor_tagihan')->nullable();
            $table->integer('total_harga');
            $table->enum('status', ['utang', 'lunas'])->default('utang');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();

            // RELATIONSHIP
            $table->foreign('id_peminjaman')->references('id')
            ->on('rents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
