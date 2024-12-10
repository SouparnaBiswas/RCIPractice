<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePassItem extends Model
{
    use HasFactory;

    public function itemDetail()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }
}
