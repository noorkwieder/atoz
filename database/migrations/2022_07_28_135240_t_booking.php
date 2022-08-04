<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
        Schema::create('tbooking', function (Blueprint $table) {
            $table->id('id');
            
        
            $table->string('done');
            $table->foreignId('triptype_id')
                    ->constrained('TripsType')
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
