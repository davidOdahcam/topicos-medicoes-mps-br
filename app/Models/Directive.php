<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directive extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function purposes()
    {
        return $this->belongsToMany(Purpose::class);
    }

    public function objectives()
    {
        return $this->belongsToMany(Objective::class, 'objective_directive');
    }
}
