<?php

namespace Database\Seeders;

use App\Models\Directive;
use App\Models\Metric;
use App\Models\Objective;
use App\Models\Project;
use App\Models\Purpose;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory(5)->create()->each(function (Project $project) {
            $project->purposes()->saveMany(Purpose::factory(3)->create()->each(function (Purpose $purpose) {
                $purpose->directives()->saveMany(Directive::factory(3)->create()->each(function (Directive $directive) {
                    $directive->objectives()->saveMany(Objective::factory(3)->create()->each(function (Objective $objective) {
                        $objective->metrics()->saveMany(Metric::factory(3)->create());
                    }));
                }));
            }));
        });
    }
}
