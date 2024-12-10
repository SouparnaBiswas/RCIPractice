<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalIssueVoucherDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_issue_voucher_id',
        'item_id',
        'quantity',
        'unit_price',
        'total_price',
        'remarks',
    ];

    public function item()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }


}
