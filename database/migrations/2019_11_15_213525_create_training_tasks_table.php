<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('header');
            $table->string('content');
            $table->string('results');

            $table->unsignedBigInteger('training_programs_id');
            $table->foreign('training_programs_id')->references('id')->on('training_programs');


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
        Schema::dropIfExists('training_tasks');
    }
}
