<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Objective;
use App\Models\Metric;

class CreateObjectiveMetricTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objective_metric', function (Blueprint $table) {
            $table->foreignIdFor(Objective::class)->constrained();
            $table->foreignIdFor(Metric::class)->constrained();
            $table->primary(['objective_id', 'metric_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objective_metric');
    }
}
