<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLoan extends Model
{
    use HasFactory;

    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_code');
    }


    public function inventory()
    {
        return $this->belongsTo(InventoryNumber::class, 'icc_no');
    }

    
}
