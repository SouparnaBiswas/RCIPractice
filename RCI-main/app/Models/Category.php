<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation_type_id',
        'category',
        'gazetted',
        'status',
    ];

    public function designationType()
    {
        return $this->belongsTo(DesignationType::class);
    }
}
