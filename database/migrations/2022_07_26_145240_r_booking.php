<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::create('rbooking', function (Blueprint $table) {
        $table->id('id');
        $table->date('date');
        $table->time('time');
        $table->string('done');
        $table->foreignId('table_id')
                ->constrained('Tablets')
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
