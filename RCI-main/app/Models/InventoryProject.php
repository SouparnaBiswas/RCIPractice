<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryProject extends Model
{
    use HasFactory;

    public function sanctionAuthority()
    {
        return $this->belongsTo(Member::class, 'sanction_authority');
    }
}
