<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorySir extends Model
{
    use HasFactory;

    protected $fillable = [
        'sir_no',
        'sir_date',
        'status',
    ];
}
