<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TadaCategoryAllowance extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'tada_category_allowance';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id';

    // Disable timestamps if the table does not have 'created_at' and 'updated_at' columns
    public $timestamps = false;

    // Specify the fillable fields
    protected $fillable = [
        'category_id',
        'title',
        'purpose',
        'amount',
        'payment_type',
        'currency',
        'status',
        'created_at'
    ];
}
