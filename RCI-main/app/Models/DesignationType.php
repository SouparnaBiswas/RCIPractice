<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignationType extends Model
{
    use HasFactory;

    // section relation
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
