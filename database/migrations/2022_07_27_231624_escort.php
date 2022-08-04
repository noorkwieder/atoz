<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Escort extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Escorts', function (Blueprint $table) {
            $table->id('id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('phone');
            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete();
            $table->string('img_url');
            $table->integer('price_per_day');
            $table->integer('free');
            $table->foreignId('covernorate_id2')
            ->constrained('covernorates')
            ->cascadeOnDelete();
        });
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
