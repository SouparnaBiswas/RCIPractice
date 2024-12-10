<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrear extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'date',
        'amt',
        'cps',
        'i_tax',
        'cghs',
        'gmc',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
