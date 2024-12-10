<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalIssueVoucher extends Model
{
    use HasFactory;

    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }

    public function gatePass()
    {
        return $this->belongsTo(GatePass::class, 'gate_pass_id');
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function inventoryNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'inv_no');
    }
}
