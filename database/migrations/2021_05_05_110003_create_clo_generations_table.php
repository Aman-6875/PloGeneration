<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCloGenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clo_generations', function (Blueprint $table) {
            $table->id();
            $table->string('course_title')->nullable();
            $table->string('course_code');
            $table->string('student_id');
            $table->string('semester');
            $table->string('col_one_plo');
            $table->string('col_two_plo');
            $table->string('col_three_plo');
            $table->string('plo');
            $table->string('col_one_input');
            $table->string('col_two_input');
            $table->string('col_three_input');
            $table->string('weightage');
            $table->string('total_col_one');
            $table->string('total_col_two');
            $table->string('total_col_three');
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
        Schema::dropIfExists('clo_generations');
    }
}
