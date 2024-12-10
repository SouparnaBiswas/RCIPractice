<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditVoucher extends Model
{
    use HasFactory;

    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_code_id');
    }
}
