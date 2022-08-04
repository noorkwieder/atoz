<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Coupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Coupons', function (Blueprint $table) {
            $table->id('id');
            $table->date('exp_date');
            $table->integer('price');
            $table->string('name');
            $table->string('type');
            $table->string('done');
            $table->integer('percentage');
           
                    $table->foreignId('user_id')->nullable()
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
