<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitVoucher extends Model
{
    use HasFactory;

    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }

    public function inventoryNumbers()
    {
        return $this->hasOne(InventoryNumber::class, 'id', 'inv_no');
    }
}
