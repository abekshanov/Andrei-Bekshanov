<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTrainingTaskTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // change property foreign key ONDELETE on cascade and nullable-false
        Schema::table('training_tasks', function (Blueprint $table) {
            //
            $table->dropForeign(['training_programs_id']);
            $table->unsignedBigInteger('training_programs_id')->nullable('false')->change();
            $table->foreign('training_programs_id')->references('id')->on('training_programs')->onDelete('cascade');

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
        Schema::table('training_tasks', function (Blueprint $table) {
            //
            $table->dropForeign(['training_programs_id']);
            $table->unsignedBigInteger('training_programs_id')->nullable()->change();
            $table->foreign('training_programs_id')->references('id')->on('training_programs')->onDelete('SET NULL');

        });
    }
}
