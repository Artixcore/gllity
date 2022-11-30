<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('pos_customer_fullname')->nullable();
            $table->string('pos_customer_phone')->nullable();
            $table->string('pos_customer_email')->nullable();
            $table->string('pos_customer_address')->nullable();
            $table->string('pos_name')->nullable();
            $table->string('pos_price')->nullable();
            $table->string('pos_quantity')->nullable();
            $table->string('pos_subtotal')->nullable();
            $table->string('pos_tax')->nullable();
            $table->string('pos_total')->nullable();
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
        Schema::dropIfExists('p_o_s');
    }
}
