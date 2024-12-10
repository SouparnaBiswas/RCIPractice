<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cghs extends Model
{
    use HasFactory;

    public function payLevel()
    {
        return $this->belongsTo(PmLevel::class, 'pay_level_id');
    }
}
