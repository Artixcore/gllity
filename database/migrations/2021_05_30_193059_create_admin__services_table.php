<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin__services', function (Blueprint $table) {
            $table->id();
            $table->string('s_name')->nullable();
            $table->string('s_slug')->nullable();
            $table->string('s_desc')->nullable();
            $table->string('s_price')->nullable();
            $table->string('s_category')->nullable();
            $table->string('s_discount')->nullable();
            $table->string('s_location')->nullable();
            $table->string('s_time')->nullable();
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
        Schema::dropIfExists('admin__services');
    }
}
