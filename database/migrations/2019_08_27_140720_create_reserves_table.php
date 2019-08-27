<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->integer('r_id');
            $table->primary('r_id');

            $table->integer('cid');
            $table->foreign('cid')->references('cid')->on('customers');

            $table->integer('room_no');
            $table->foreign('room_no')->references('room_no')->on('rooms');

            $table->integer('t_id');
            $table->foreign('t_id')->references('t_id')->on('room_types');

            $table->timestamp('resereved_date_time')->useCurrent();
            $table->date('check_in');
            $table->date('check_out');

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
        Schema::dropIfExists('reserves');
    }
}
