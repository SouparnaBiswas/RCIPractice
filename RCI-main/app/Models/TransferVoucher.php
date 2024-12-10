<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferVoucher extends Model
{
    use HasFactory;

    public function fromInvNo()
    {
        return $this->belongsTo(InventoryNumber::class, 'from_inv_number');
    }

    public function toInvNo()
    {
        return $this->belongsTo(InventoryNumber::class, 'to_inv_number');
    }
}
