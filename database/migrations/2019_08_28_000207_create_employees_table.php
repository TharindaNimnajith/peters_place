<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->integer('id')->unsigned();
            $table->string('type', 10);

            $table->primary(['id', 'type']);

            $table->string("image")->nullable();
            $table->string("name", 100)->nullable();
            $table->string("gender")->nullable();
            $table->string("NIC", 15)->nullable();
            $table->string("Address", 100)->nullable();
            $table->date("DOB")->nullable();
            $table->string("category")->nullable();
            $table->integer("salary")->nullable();
            $table->date("joindate")->nullable();

            $table->integer("tp")->nullable();
            $table->integer("tp2")->nullable();
            $table->string("Email", 50)->nullable();
            $table->integer("attendence")->nullable();

            $table->string("remark", 500)->nullable();

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
        Schema::dropIfExists('employees');
    }
}
