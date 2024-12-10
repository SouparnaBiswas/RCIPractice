<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payband extends Model
{
    use HasFactory;

    protected $fillable = [
        'payband_type_id',
        'low_band',
        'high_band',
        'grade_pay',
    ];

    public function paybandType()
    {
        return $this->belongsTo(PaybandType::class);
    }
}
