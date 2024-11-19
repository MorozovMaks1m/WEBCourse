<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    /** @use HasFactory<\Database\Factories\ThesisFactory> */
    use HasFactory;

    public function thesis()
    {
        return $this->belongsTo(Education::class, 'education_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'thesis_skill');
    }
}
