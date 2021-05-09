<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksWithCloPlosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks_with_clo_plos', function (Blueprint $table) {
            $table->id();
            $table->double('mark');
            $table->unsignedBigInteger('clo_id');
            $table->unsignedBigInteger('plo_id');
            $table->unsignedBigInteger('marking_parameter');
            $table->unsignedBigInteger('course_id');
            $table->string('student_id');
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
        Schema::dropIfExists('marks_with_clo_plos');
    }
}
