<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Objective;
use App\Models\Directive;

class CreateObjectiveDirectiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objective_directive', function (Blueprint $table) {
            $table->foreignIdFor(Objective::class)->constrained();
            $table->foreignIdFor(Directive::class)->constrained();
            $table->primary(['objective_id', 'directive_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objective_directive');
    }
}
