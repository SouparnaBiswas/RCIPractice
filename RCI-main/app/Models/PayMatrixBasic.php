<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayMatrixBasic extends Model
{
    use HasFactory;

    public function pmLevel()
    {
        return $this->belongsTo(PmLevel::class, 'pm_level_id');
    }

    public function payMatrixRow()
    {
        return $this->belongsTo(PayMatrixRow::class, 'pay_matrix_row_id');
    }
}
