<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIssueVoucherDetail extends Model
{
    use HasFactory;

    //item code realation
    public function item()
    {
        return $this->belongsTo(ItemCode::class, 'item_code');
    }

}
