<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafficControl extends Model
{
    use HasFactory;


    protected $fillable = [
        'tcr_number',
        'supply_order_id',
        'vendor_id',
        'transport_id',
        'lr_rr_awb_bl_app_rpp_number',
        'lr_rr_awb_bl_app_rpp_date',
        'contract_no',
        'authority_and_date',
        'date_of_collection_of_stores',
        'no_of_package',
        'gross_weight',
        'condition_of_package',
        'amount',
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
