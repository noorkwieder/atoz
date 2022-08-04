<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Escortlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Escortslan', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
           
            $table->foreignId('escort_id')
                    ->constrained('Escorts')
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
