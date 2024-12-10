<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CdaBillAuditTeam;
use App\Models\ImprestResetVoucher;
use App\Models\Project;
use App\Models\VariableType;
use Illuminate\Support\Str;

class CdaBillAuditTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cdaBills = CdaBillAuditTeam::orderBy('id', 'desc')->with('project','variableType')->paginate(10);
        $projects = Project::orderBy('id', 'desc')->where('status',1)->get();
        $variable_types = VariableType::orderBy('id','desc')->where('status',1)->get();
        return view('imprest.cda-bills.list', compact('cdaBills','projects','variable_types'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cdaBills = CdaBillAuditTeam::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('adv_no', 'like', '%' . $query . '%')
                    ->orWhere('adv_date', 'like', '%' . $query . '%')
                    ->orWhere('adv_amount', 'like', '%' . $query . '%')
                    ->orWhere('var_no', 'like', '%' . $query . '%')
                    ->orWhere('var_date', 'like', '%' . $query . '%')
                    ->orWhere('var_amount', 'like', '%' . $query . '%')
                    ->orWhere('chq_no', 'like', '%' . $query . '%')
                    ->orWhere('chq_date', 'like', '%' . $query . '%')
                    ->orWhere('crv_no', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('imprest.cda-bills.table', compact('cdaBills'))->render()]);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'pc_no' => 'required',
        //     'project_id' => 'required',
        //     'adv_no' => 'required|numeric',
        //     'adv_date' => 'required',
        //     'adv_amount' => 'required',
        //     'var_date' => 'required|numeric',
        //     'var_amount' => 'required',
        //     'crv_no' => 'required',
        //     'firm_name' => 'required',
        //     'cda_bill_no' => 'required',
        //     'cda_bill_date' => 'required',
        //     'cda_bill_amount' => 'required',
        // ]);

        $voucherText = ImprestResetVoucher::where('status', 1)->first();
        $cdaBill = CdaBillAuditTeam::latest()->first();

        $constantString = $voucherText->voucher_no_text ?? 'RCI-CHESS-IMPRESS-';
        if(isset($cdaBill))
        {
            $serial_no = Str::substr($cdaBill->var_no, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }
        
        $cda_bill = new CdaBillAuditTeam();
        $cda_bill->pc_no = $request->pc_no;
        $cda_bill->project_id = $request->project_id;
        $cda_bill->adv_no = $request->adv_no;
        $cda_bill->adv_date = $request->adv_date;
        $cda_bill->adv_amount = $request->adv_amount;
        $cda_bill->var_no = $constantString . $counter;
        $cda_bill->var_date = $request->var_date;
        $cda_bill->var_amount = $request->var_amount;
        $cda_bill->crv_no = $request->crv_no;
        $cda_bill->firm_name = $request->firm_name;
        $cda_bill->cda_bill_no = $request->cda_bill_no;
        $cda_bill->cda_bill_date = $request->cda_bill_date;
        $cda_bill->cda_bill_amount = $request->cda_bill_amount;
        $cda_bill->save();

        session()->flash('message', 'CDA bill updated successfully');
        return response()->json(['success' => 'CDA bill updated successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cdaBill = CdaBillAuditTeam::find($id);
        $projects = Project::orderBy('id', 'desc')->get();
        $variable_types = VariableType::orderBy('id','desc')->get();
        $edit = true;
       
        return response()->json(['view' => view('imprest.cda-bills.form', compact('edit','cdaBill','projects','variable_types'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'adv_no' => 'required',
        //     'adv_date' => 'required',
        //     'adv_amount' => 'required|numeric',
        //     'project_id' => 'required',
        //     'var_date' => 'required',
        //     'var_amount' => 'required|numeric',
        //     'var_type_id' => 'required',
        //     'chq_no' => 'required',
        //     'chq_date' => 'required',
        //     'crv_no' => 'required',
        // ]);

        $cda_bill = CdaBillAuditTeam::findOrFail($id);
        $cda_bill->pc_no = $request->pc_no;
        $cda_bill->project_id = $request->project_id;
        $cda_bill->adv_no = $request->adv_no;
        $cda_bill->adv_date = $request->adv_date;
        $cda_bill->adv_amount = $request->adv_amount;
        $cda_bill->var_date = $request->var_date;
        $cda_bill->var_amount = $request->var_amount;
        $cda_bill->crv_no = $request->crv_no;
        $cda_bill->firm_name = $request->firm_name;
        $cda_bill->cda_bill_no = $request->cda_bill_no;
        $cda_bill->cda_bill_date = $request->cda_bill_date;
        $cda_bill->cda_bill_amount = $request->cda_bill_amount;
        $cda_bill->update();

        session()->flash('message', 'CDA bill updated successfully');
        return response()->json(['success' => 'CDA bill updated successfully']);
    }

    public function delete(string $id)
    {
        $cdaBill = CdaBillAuditTeam::find($id);
        $cdaBill->delete();

        return redirect()->back()->with('message', 'CDA bill deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
