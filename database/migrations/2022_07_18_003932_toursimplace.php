<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Toursimplace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toursimplaces2', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->integer('free_price');
            $table->text('description');
            $table->integer('views')->default(0);
            $table->string('img_url');
            $table->time('open_time');
            $table->time('close_time');
                $table->text('location');

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete();
                $table->foreignId('covernorate_id2')
                ->constrained('covernorates')
                ->cascadeOnDelete();


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
