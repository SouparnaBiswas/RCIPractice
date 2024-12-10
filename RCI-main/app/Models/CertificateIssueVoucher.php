<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIssueVoucher extends Model
{
    use HasFactory;

    // public function member()
    // {
    //     return $this->belongsTo(Member::class, 'member_id');
    // }

    public function userDetail()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
    

    public function item()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }

    // inventory relation
    public function inventory()
    {
        return $this->belongsTo(InventoryNumber::class, 'inv_no');
    }
}
