<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrazsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obrazs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('img');
            $table->string('is_elder')->default(0);
            $table->string('is_kid')->default(0);
            $table->string('is_shown')->default(1);
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
        Schema::dropIfExists('obrazs');
    }
}
