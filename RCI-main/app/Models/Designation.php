<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'designation_type_id',
        'payscale_type_id',
        'payband_type_id',
        'designation',
        'full_name',
        'order',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function designationType()
    {
        return $this->belongsTo(DesignationType::class);
    }

    public function paybandType()
    {
        return $this->belongsTo(PaybandType::class);
    }

    public function payscaleType()
    {
        return $this->belongsTo(PayscaleType::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function payLevel()
    {
        return $this->belongsTo(PmLevel::class);
    }

}
