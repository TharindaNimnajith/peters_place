<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_events', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('c_name');
            $table->date('event_date');
            $table->time('time');
            $table->string('category');
            $table->integer('guests');
            $table->double('mid');
            $table->double('advance');
            $table->double('total');

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
        Schema::dropIfExists('pay_events');
    }
}
