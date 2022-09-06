<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function directives()
    {
        return $this->belongsToMany(Directive::class, 'objective_directive');
    }

    public function metrics()
    {
        return $this->belongsToMany(Metric::class, 'objective_metric');
    }
}
