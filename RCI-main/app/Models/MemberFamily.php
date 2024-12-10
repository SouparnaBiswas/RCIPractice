<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberFamily extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function children()
    {
        return $this->hasMany(MemberChildrenDetail::class);
    }
}
