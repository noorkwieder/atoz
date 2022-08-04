<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HBooking', function (Blueprint $table) {
            $table->id('id');
            $table->date('enter_date');
            $table->integer('days');
            $table->string('done');
            $table->foreignId('roomtype_id')
                    ->constrained('roomtybe')
                    ->cascadeOnDelete();
                    $table->foreignId('user_id')
                    ->constrained('users')
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
