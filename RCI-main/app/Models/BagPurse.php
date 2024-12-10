<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagPurse extends Model
{
    use HasFactory;
    //category relation
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
