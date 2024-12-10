<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use PDF;
use App\Models\CdaBillAuditTeam;
use DateTime;
use Carbon\Carbon;

class ImprestReportController extends Controller
{
    //
    public function imprestReport()
    {
        $accountants  = User::role('ACCOUNTANT')->get();
        return view('imprest.reports.form',compact('accountants'));
    }

    public function imprestReportGenerate(Request $request)
    {
        // validation
        $this->validate($request, [
            'report_date' => 'required',
            'account_officer_sign' => 'required',
            'bill_type' => 'required',
        ]);

        // how to add this format like d/m/y
        
        
        $request_date = $request->report_date;
        $date = new DateTime($request_date);

        // Format the date as required
        $report_date = $date->format('d/m/y');
        
        if($request->bill_type == 'cash_book')
        {
            $pdf = PDF::loadView('imprest.reports.cash-book-report-generate', compact('report_date'));
            return $pdf->download('cash-book-report-' . $report_date . '.pdf');
        }
        else if($request->bill_type == 'out_standing'){

            $pdf = PDF::loadView('imprest.reports.out-standing-report-generate', compact('report_date'));
            return $pdf->download('out-standing-report-' . $report_date . '.pdf');

        }else if($request->bill_type == 'bill_hand'){

            $pdf = PDF::loadView('imprest.reports.bill-hand-report-generate', compact('report_date'));
            return $pdf->download('bill-hand-report-' . $report_date . '.pdf');

        }else if($request->bill_type == 'cda_bill'){

            $cda_at_bills = CdaBillAuditTeam::orderBy('id', 'desc')
                            ->where('created_at', '<', $request_date)
                            ->get();
            $total = 0;
            foreach($cda_at_bills as $cda_at_bill){
                $total += $cda_at_bill->cda_bill_amount;
            }
            $pdf = PDF::loadView('imprest.reports.cda-bill-report-generate', compact('report_date','cda_at_bills','total'));
            return $pdf->download('cda_bill-report-' . $report_date . '.pdf');
        }else{
            return redirect()->back()->with('error', 'Invalid Bill Type');
        }
    }
}
