<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->id();

            $table->string('term');
            $table->string('notion');
            $table->string('impact');
            $table->string('synonymous');
            $table->string('source');
            $table->string('type');
            $table->string('format');
            $table->string('indicator_type');
            $table->string('how_to_calculate');
            $table->string('how_to_analyze');

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
        Schema::dropIfExists('metrics');
    }
}
