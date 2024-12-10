<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TadaAdvance extends Model
{
    use HasFactory;

    protected $table = 'tada_advance';

    protected $fillable = [
        'project_id',
        'member_id',
        'bill_no',
        'bill_date',
        'amount_requested',
        'amount_allowed',
        'amount_disallowed',
        'status',
    ];

    protected $casts = [
        'bill_date' => 'date',
        'amount_requested' => 'float',
        'amount_allowed' => 'float',
        'amount_disallowed' => 'float',
        'status' => 'boolean',
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
