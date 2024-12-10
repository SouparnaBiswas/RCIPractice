<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDAReceipt extends Model
{
    use HasFactory;

    protected $table = 'cda_receipts';


    public function cdaReceiptDetails()
    {
        return $this->belongsTo(CdaReceiptDetail::class, 'details');
    }
}
