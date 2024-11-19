<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkProject extends Model
{
    /** @use HasFactory<\Database\Factories\WorkProjectFactory> */
    use HasFactory;

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id');
    }
}
