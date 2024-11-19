<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Education extends Model
{
    /** @use HasFactory<\Database\Factories\EducationFactory> */
    use HasFactory;

    public function summary(int $lenght = 50): string
    {
        return Str::of($this->description)->limit($lenght);
    }

    public function thesis()
    {
        return $this->hasOne(Thesis::class, 'education_id');
    }
}
