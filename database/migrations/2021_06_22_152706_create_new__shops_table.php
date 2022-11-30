<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new__shops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_avatar')->default('avatar.png');
            $table->string('shop_name');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('shop_phone')->nullable();
            $table->string('shop_location')->nullable();;
            $table->string('shop_address')->nullable();;
            $table->string('urole')->default('admin');
            $table->string('shop_status')->default('1');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('new__shops');
    }
}
