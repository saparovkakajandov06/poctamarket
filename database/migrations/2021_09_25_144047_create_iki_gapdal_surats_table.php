<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkiGapdalSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iki_gapdal_surats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img');
            $table->string('is_shown')->default(1);
            $table->string('sort_order')->default(0);
            $table->string('title');
            $table->string('link');
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
        Schema::dropIfExists('iki_gapdal_surats');
    }
}
