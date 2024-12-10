<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmLevel extends Model
{
    use HasFactory;

    //pay commission relation
    public function payCommission()
    {
        return $this->belongsTo(PayCommission::class, 'pay_commission');
    }

    public function payBand()
    {
        return $this->belongsTo(Payband::class, 'payband');
    }

    //grade pay relation
    // public function gradePay()
    // {
    //     return $this->hasMany(GradePay::class, 'pay_level');
    // }

    
}
