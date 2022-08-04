<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SaveResturants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SaveResturants', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete();
           
            $table->foreignId('resturant_id')
                    ->constrained('Resturants')
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
