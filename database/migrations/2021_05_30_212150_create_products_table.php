<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('user_id')->nullable();
            $table->string('p_name')->nullable();
            $table->string('p_desc')->nullable();
            $table->string('p_location')->nullable();
            $table->string('p_price')->nullable();
            $table->string('p_discount')->nullable();
            $table->string('p_image')->nullable();
            $table->string('p_employee')->nullable();
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
}
