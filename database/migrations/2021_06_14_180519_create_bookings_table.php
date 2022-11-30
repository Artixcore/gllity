<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('service_id');
            $table->bigInteger('booking_id');
            $table->string('booking_date')->nullable();
            $table->string('booking_time')->nullable();
            $table->string('booking_customer_name')->nullable();
            $table->string('booking_customer_email')->nullable();
            $table->string('booking_customer_phone')->nullable();
            $table->string('booking_number_of_customer')->nullable();
            $table->string('booking_tax')->nullable();
            $table->string('booking_total')->nullable();
            $table->string('booking_status')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
