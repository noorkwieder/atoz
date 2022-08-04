<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Roomtype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomtybe', function (Blueprint $table) {
            $table->id('id');
            $table->string('type');
            $table->string('free');
            $table->integer('price');
            $table->integer('number_of_person');
            $table->foreignId('hotel_id')
                    ->constrained('Hotels')
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
