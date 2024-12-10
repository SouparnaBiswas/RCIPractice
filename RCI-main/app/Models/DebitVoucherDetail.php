<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitVoucherDetail extends Model
{
    use HasFactory;

    public function debitVoucher()
    {
        return $this->belongsTo(DebitVoucher::class);
    }

    public function itemCodes()
    {
        return $this->hasMany(ItemCode::class, 'id', 'item_id');
    }

    
}
