<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTrainingTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_tasks', function (Blueprint $table) {
            //

            $table->string('results')->nullable()->change();
            $table->string('results')->default('null')->change();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_tasks', function (Blueprint $table) {
            //

            $table->string('results')->nullable(false)->change();
            $table->string('results')->default(false)->change();


        });
    }
}
