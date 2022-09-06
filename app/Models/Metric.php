<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    use HasFactory;

    protected $fillable = [
        'term',
        'notion',
        'impact',
        'synonymous',
        'source',
        'type',
        'format',
        'indicator_type',
        'how_to_calculate',
        'how_to_analyze',
    ];

    public function synonymin()
    {
        return $this->belongsTo(Metric::class, 'synonymous');
    }

    public function objectives()
    {
        return $this->belongsToMany(Objective::class, 'objective_metric');
    }
}
