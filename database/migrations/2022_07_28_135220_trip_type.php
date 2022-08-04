<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TripType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TripsType', function (Blueprint $table) {
            $table->id('id');
            $table->string('type');
            $table->string('price');
        
            $table->integer('free');
         
                    $table->foreignId('trip_id')
                    ->constrained('Trips')
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
