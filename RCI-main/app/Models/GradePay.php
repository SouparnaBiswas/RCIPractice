<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradePay extends Model
{
    use HasFactory;

    public function pmLevel()
    {
        return $this->belongsTo(PmLevel::class, 'pay_level');
    }
}
