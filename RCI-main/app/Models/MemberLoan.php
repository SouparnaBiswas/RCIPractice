<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberLoan extends Model
{
    use HasFactory;

    //member loan belongs loan name

    public function loan(){
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }

    public function member(){
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
   
}
