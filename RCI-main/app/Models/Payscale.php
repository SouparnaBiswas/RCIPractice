<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payscale extends Model
{
    use HasFactory;

    protected $fillable = [
        'payscale_type_id',
        'basic1',
        'basic2',
        'basic3',
        'increment1',
        'increment2',
    ];

    public function payscaleType()
    {
        return $this->belongsTo(PayscaleType::class);
    }
}
