<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberChildAllowance extends Model
{
    use HasFactory;

    //member relation
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
