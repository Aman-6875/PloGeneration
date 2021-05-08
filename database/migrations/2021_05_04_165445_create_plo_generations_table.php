<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePloGenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plo_generations', function (Blueprint $table) {
            $table->id();
            $table->string('course_title')->nullable();
            $table->string('course_code');
            $table->string('student_id');
            $table->string('semester');
            $table->string('col_one_plo');
            $table->string('col_two_plo');
            $table->string('col_three_plo');
            $table->double('col_one_plo_avg');
            $table->double('col_two_plo_avg');
            $table->double('col_three_plo_avg');
            $table->unsignedBigInteger('clo_generation_table_id');
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
        Schema::dropIfExists('plo_generations');
    }
}
