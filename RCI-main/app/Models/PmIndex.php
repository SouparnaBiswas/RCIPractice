<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmIndex extends Model
{
    use HasFactory;

    // pm level relation
    public function pmLevel()
    {
        return $this->belongsTo(PmLevel::class, 'pm_level_id');
    }
}
