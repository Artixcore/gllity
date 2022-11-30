<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            // $table->string('service_category_id')->nullable();
            $table->string('s_id')->nullable();
            $table->string('s_name')->nullable();
            $table->string('s_slug')->nullable();
            $table->string('s_desc')->nullable();
            $table->string('s_price')->nullable();
            $table->string('s_location')->nullable();
            $table->string('s_category')->nullable();
            $table->string('s_timing')->nullable();
            $table->string('s_employee')->nullable();
            $table->string('s_image')->nullable();
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
        Schema::dropIfExists('services');
    }
}
