<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rent_id');
            $table->string('customer_id');
            $table->string('invoice_number')->nullable();
            $table->integer('total_price');
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->string('payment_proof')->nullable();
            $table->timestamps();

            // RELATIONSHIP
            $table->foreign('rent_id')->references('id')
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
        Schema::dropIfExists('invoices');
    }
}
