<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Work extends Model
{
    /** @use HasFactory<\Database\Factories\WorkFactory> */
    use HasFactory;

    protected $guarded = [];

    public function summary(int $lenght = 50): string
    {
        return Str::of($this->description)->limit($lenght);
    }

    public function workProjects()
    {
        return $this->hasMany(WorkProject::class, 'work_id');
    }
}
