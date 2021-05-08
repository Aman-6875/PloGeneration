<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToCloPloEngagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marking_distributions', function (Blueprint $table) {
            $table->unsignedBigInteger('marking_parameter_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marking_distributions', function (Blueprint $table) {
            $table->dropColumn('marking_parameter_id');
        });
    }
}
