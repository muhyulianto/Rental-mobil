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
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('armada_id')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->integer('services_type');
            $table->timestamp('start_date');
            $table->integer('duration');
            $table->timestamp('end_date')->nullable();
            $table->string('pickup_location')->nullable();
            $table->enum('status', ['pending', 'onloan', 'completed'])->default('pending');
            $table->timestamps();

            // Relationship
            $table->foreign('customer_id')->references('id')
                ->on('customers')->onDelete('cascade');
            $table->foreign('car_id')->references('id')
                ->on('cars')->onDelete('cascade');
            $table->foreign('armada_id')->references('id')
                ->on('armadas')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')
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
