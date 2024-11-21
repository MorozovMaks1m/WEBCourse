<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory;

    public function theses()
    {
        return $this->belongsToMany(Thesis::class, 'thesis_skill');
    }

    public function workprojects()
    {
        return $this->belongsToMany(WorkProject::class, 'workproject_skill');
    }
}
