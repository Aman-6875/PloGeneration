<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkingDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marking_distributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plo_id');
            $table->unsignedBigInteger('clo_id');
            $table->unsignedBigInteger('course_id');
            $table->double('parcentage');
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
        Schema::dropIfExists('marking_distributions');
    }
}
