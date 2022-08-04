<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Resturants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Resturants', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
        $table->time('open_time');
        $table->time('close_time');
            $table->text('phone');
            $table->text('location');
            $table->integer('stars')->default(1);
            $table->integer('views')->default(0);
            $table->string('img_url');
            $table->foreignId('covernorate_id2')
                ->constrained('covernorates')
                ->cascadeOnDelete();
                $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();


       /*     $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();*/

            $table->timestamps();
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
