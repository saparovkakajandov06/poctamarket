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
            $table->bigIncrements('id');
            $table->string('login');
            $table->string('name');
            $table->string('surname');
            $table->string('middlename');
            $table->date('birthday');
            $table->string('address');
            $table->char('phone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(TRUE);
            $table->string('password');
            $table->char('role')->nullable(TRUE);
            $table->integer('work')->nullable(TRUE);
            $table->rememberToken()->nullable(TRUE);
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
