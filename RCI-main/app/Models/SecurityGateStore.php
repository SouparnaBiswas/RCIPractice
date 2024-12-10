<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityGateStore extends Model
{
    use HasFactory;

    protected $fillable = [
        'supply_order_id',
        'vendor_id',
        'entry_time',
        'dc_invoice_bill_voucher_no',
        'dc_invoice_bill_voucher_date',
        'no_of_package',
        'vehicle_no',
        'remarks',
    ];

    public function supplyOrder()
    {
        return $this->belongsTo(SupplyOrder::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
