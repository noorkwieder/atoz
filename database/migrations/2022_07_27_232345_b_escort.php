<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BEscort extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('ebooking', function (Blueprint $table) {
            $table->id('id');
            $table->date('date');
            $table->integer('number_day');
            $table->string('done');
            $table->foreignId('escort_id')
                    ->constrained('Escorts')
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
