<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SaveHotels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SaveHotel', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete();
           
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
