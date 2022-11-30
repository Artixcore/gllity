<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->default('avatar.png');
            $table->string('name')->unique();
            $table->string('b_website')->nullable();;
            $table->string('phone')->nullable();;
            $table->string('gender')->nullable();;
            $table->string('location')->nullable();;
            $table->string('address')->nullable();;
            $table->string('urole')->nullable();
            $table->string('email')->unique();
            $table->string('status')->default('1');
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
        Schema::dropIfExists('users');
    }
}
