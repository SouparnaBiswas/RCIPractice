<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    public function fundVendor()
    {
        return $this->belongsTo(PublicFundVendor::class, 'fund_vendors_id');
    }

    //category relation
    public function category()
    {
        return $this->belongsTo(PaymentCategory::class, 'category_id');
    }
}
