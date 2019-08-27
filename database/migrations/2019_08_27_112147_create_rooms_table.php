<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->integer('room_no');
            $table->primary('room_no');

            $table->integer('floor');
            $table->boolean('availability')->default(1);
            $table->boolean('status')->default(1);
            $table->string('description')->nullable();

            $table->integer('t_id');
            $table->foreign('t_id')->references('t_id')->on('room_types');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
