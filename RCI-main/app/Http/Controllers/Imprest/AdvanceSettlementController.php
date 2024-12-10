<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvanceSettlement;
use App\Models\Project;
use App\Models\VariableType;
use App\Models\AdvanceSettlementBill;

class AdvanceSettlementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advance_settlements = AdvanceSettlement::orderBy('id', 'desc')->paginate(10);
        $projects = Project::orderBy('id','desc')->get();
        return view('imprest.advance-settlement.list', compact('advance_settlements','projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function fetchData(Request $request)
    {
       
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $advance_settlements = AdvanceSettlement::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('adv_no', 'like', '%' . $query . '%')
                    ->orWhere('adv_date', 'like', '%' . $query . '%')
                    ->orWhere('adv_amount', 'like', '%' . $query . '%')
                    ->orWhere('var_no', 'like', '%' . $query . '%')
                    ->orWhere('var_date', 'like', '%' . $query . '%')
                    ->orWhere('var_amount', 'like', '%' . $query . '%')
                    ->orWhere('chq_no', 'like', '%' . $query . '%')
                    ->orWhere('chq_date', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('imprest.advance-settlement.table', compact('advance_settlements'))->render()]);
            
        }
    }

    public function create()
    {
        $projects = Project::orderBy('id','desc')->get();
        $variable_types = VariableType::orderBy('id','desc')->get();

        return view('imprest.advance-settlement.form',compact('projects','variable_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'adv_no' => 'required',
            'adv_date' => 'required',
            'adv_amount' => 'required|numeric',
            'project_id' => 'required',
            'var_no' => 'required',
            'var_date' => 'required',
            'var_amount' => 'required',
            'var_type_id' => 'required',
            'chq_no' => 'required',
            'chq_date' => 'required',
        ]);

       
        $advance_settlement = new AdvanceSettlement();
        $advance_settlement->adv_no = $request->adv_no;
        $advance_settlement->adv_date = $request->adv_date;
        $advance_settlement->adv_amount = $request->adv_amount;
        $advance_settlement->project_id = $request->project_id;
        $advance_settlement->var_no = $request->var_no;
        $advance_settlement->var_date = $request->var_date;
        $advance_settlement->var_amount = $request->var_amount;
        $advance_settlement->var_type_id = $request->var_type_id;
        $advance_settlement->chq_no = $request->chq_no;
        $advance_settlement->chq_date = $request->chq_date;
        $advance_settlement->save();

        session()->flash('message', 'Advance Settlement added successfully');
        return response()->json(['success' => 'Advance Settlement added successfully']);
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
        $advance_settlement = AdvanceSettlement::find($id);
        $projects = Project::orderBy('id','desc')->get();
        $variable_types = VariableType::orderBy('id','desc')->get();
        $advance_settlement_bills = AdvanceSettlementBill::where('advance_settlement_id',$id)->paginate(10);
        return view('imprest.advance-settlement.edit', compact('advance_settlement','projects','variable_types','advance_settlement_bills'));
    }

    public function storeAdvanceSettleBill(Request $request)
    {
        $request->validate([
            'firm' => 'required',
            'bill_amount' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        $advance_settlement_bill = new AdvanceSettlementBill();
        $advance_settlement_bill->advance_settlement_id = $request->advance_settlement_id;
        $advance_settlement_bill->firm = $request->firm;
        $advance_settlement_bill->bill_amount = $request->bill_amount;
        $advance_settlement_bill->balance = $request->balance;
        $advance_settlement_bill->save();

        return response()->json(['message' => 'Advance settlement bill added successfully', 'data' => $advance_settlement_bill]);
    }

    public function editAdvanceSettlementBill($id)
    {
        $advance_settlement_bill = AdvanceSettlementBill::find($id);
        $edit = true;
        return response()->json(['view' => view('imprest.advance-settlement.bill-form', compact('edit','advance_settlement_bill'))->render()]);
    }

    public function updateAdvanceSettleBill(Request $request)
    {
        
        $request->validate([
            'firm' => 'required',
            'bill_amount' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        $advance_settlement_bill = AdvanceSettlementBill::find($request->advance_settlement_bill_id);
        $advance_settlement_bill->firm = $request->firm;
        $advance_settlement_bill->bill_amount = $request->bill_amount;
        $advance_settlement_bill->balance = $request->balance;
        $advance_settlement_bill->update();

        return response()->json(['message' => 'Advance settlement bill updated successfully', 'data' => $advance_settlement_bill]);
    }

    public function deleteAdvanceSettleBill($id)
    {
       
        $adv_stlmnt_bill_delete = AdvanceSettlementBill::find($id);
        $adv_stlmnt_bill_delete->delete();

        session()->flash('message', 'Advance settlement bill deleted successfully');
        return response()->json(['message' => 'Advance settlement bill deleted successfully']);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'adv_no' => 'required',
            'adv_date' => 'required',
            'adv_amount' => 'required|numeric',
            'project_id' => 'required',
            'var_no' => 'required',
            'var_date' => 'required',
            'var_amount' => 'required|numeric',
            'var_type_id' => 'required',
            'chq_no' => 'required',
            'chq_date' => 'required',
        ]);

       
        $advance_settlement = AdvanceSettlement::find($id);
        $advance_settlement->adv_no = $request->adv_no;
        $advance_settlement->adv_date = $request->adv_date;
        $advance_settlement->adv_amount = $request->adv_amount;
        $advance_settlement->project_id = $request->project_id;
        $advance_settlement->var_no = $request->var_no;
        $advance_settlement->var_date = $request->var_date;
        $advance_settlement->var_amount = $request->var_amount;
        $advance_settlement->var_type_id = $request->var_type_id;
        $advance_settlement->chq_no = $request->chq_no;
        $advance_settlement->chq_date = $request->chq_date;
        $advance_settlement->save();

        session()->flash('message', 'Advance Settlement added successfully');
        return response()->json(['success' => 'Advance Settlement added successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id)
    {
        $advance_settlement = AdvanceSettlement::find($id);
        $advance_settlement->delete();

       return redirect()->route('advance-settlement.index')->with('message', 'Advance Settlement deleted successfully');
    }
}
