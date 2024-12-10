<?php

namespace App\Helpers;
use App\Models\MemberAllotedLeave;
use App\Models\MemberLeave;

class Leave
{

    public static function memberAllottedLeave($member_id,$year)
    {
        $memberAllottedLeave = MemberAllotedLeave::where('member_id', $member_id)->where('year',$year)->sum('alloted_leaves');
        return $memberAllottedLeave;
    }

    public static function memberTakenLeave($member_id,$year)
    {
        $memberTakenLeave = MemberLeave::where('member_id', $member_id)->where('year',$year)->sum('no_of_days');
        return $memberTakenLeave;
    }
   
}


?>