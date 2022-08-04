<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tablets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('Tablets', function (Blueprint $table) {
            $table->id('id');
            $table->string('type');
            $table->string('free');
          
            $table->integer('number_of_person');
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
