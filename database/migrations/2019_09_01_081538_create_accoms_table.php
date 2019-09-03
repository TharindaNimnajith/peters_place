<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accoms', function (Blueprint $table) {
            //$table->integer('id')->unique()->autoIncrement();

            $table->date('arrival_date');
            $table->date('deparure_date');

            $table->integer('adults');
            $table->integer('kids');

            //$table->string('room_type');
            $table->integer('room_type');
            $table->foreign('room_type')->references('id')->on('room_types');

            $table->integer('room_no');
            $table->primary('room_no');
            $table->foreign('room_no')->references('id')->on('rooms');

            $table->string('food_ser');
            $table->string('payment');

            $table->string('nic', 12);
            $table->foreign('nic')->references('nic')->on('posts');

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
        Schema::dropIfExists('accoms');
    }
}
