<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Trips', function (Blueprint $table) {
            $table->id('id');
            $table->string('from');
            $table->string('to');
            $table->date('date');
            $table->time('time');
            $table->string('period');
            $table->foreignId('company')
                    ->constrained('companys')
                    ->cascadeOnDelete();
                    $table->foreignId('airport')
                    ->constrained('airports')
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
