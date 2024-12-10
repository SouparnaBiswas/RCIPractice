<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberLoanInfo extends Model
{
    use HasFactory;

    //loan relation
    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }

    //member relation
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
