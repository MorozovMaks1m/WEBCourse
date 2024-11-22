<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Education extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\EducationFactory> */
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function summary(int $lenght = 50): string
    {
        return Str::of($this->description)->limit($lenght);
    }

    public function thesis()
    {
        return $this->hasOne(Thesis::class, 'education_id');
    }
}
