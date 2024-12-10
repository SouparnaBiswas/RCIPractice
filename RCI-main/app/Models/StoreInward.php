<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreInward extends Model
{
    use HasFactory;

    protected $fillable = [
        'tcr_number',
        'supply_order_id',
        'vendor_id',
        'dc_invoice_bill_voucher_no',
        'dc_invoice_bill_voucher_date',
        'rin_no',
        'rin_date',
        'qty_received',
        'date_of_receipt',
        'nomenclature',
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

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
