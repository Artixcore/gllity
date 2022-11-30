<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopBookingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop__booking__settings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('day')->nullable();
            $table->string('opening')->nullable();
            $table->string('closing')->nullable();
            $table->string('shop_status')->nullable();
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
        Schema::dropIfExists('shop__booking__settings');
    }
}
