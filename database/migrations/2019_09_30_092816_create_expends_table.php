<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('amount');
            $table->dateTime('date');
            /*$table->integer('oid')->unsigned();
            $table->foreign('oid')->references('id')->on('orders');*/
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
        Schema::dropIfExists('expends');
    }
}
