<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quater extends Model
{
    use HasFactory;

    
    public function grade_pay()
    {
        return $this->belongsTo(GradePay::class, 'grade_pay_id');
    }

}
