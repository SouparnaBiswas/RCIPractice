<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashPayment extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function fundVendor()
    {
        return $this->belongsTo(PublicFundVendor::class, 'vendor_id');
    }

    public function category()
    {
        return $this->belongsTo(PaymentCategory::class, 'category_id');
    }

    // receipt relation
    public function receipt()
    {
        return $this->belongsTo(Receipt::class, 'rct_no');
    }
}
