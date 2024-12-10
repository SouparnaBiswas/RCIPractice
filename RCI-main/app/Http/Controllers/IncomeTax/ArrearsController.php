<?php

namespace App\Http\Controllers\IncomeTax;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Arrear;
use App\Models\Member;
use Illuminate\Http\Request;

class ArrearsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::where('e_status', 'active')->orderBy('id', 'desc')->get();
        $financialYears = Helper::getFinancialYears();
        // $arrears = Arrear::with('member')->orderBy('id', 'desc')->paginate(10);
        return view('income-tax.arrears.index')->with(compact('members', 'financialYears'));
    }

    public function fetchData(Request $request)
    {
        $arrears = Arrear::with('member')->orderBy('id', 'desc')->where('member_id', $request->member_id)->paginate(10);
        $member_id = $request->member_id;
        return response()->json([
            'status' => true,
            'view' => view('income-tax.arrears.table', compact('arrears', 'member_id'))->render(),
        ]);
    }

    public function memberDetails(Request $request)
    {
        $member = Member::with(['designation', 'divisions', 'groups'])->find($request->member_id);
        $arrears = Arrear::where('member_id', $request->member_id)->orderBy('id', 'desc')->paginate(10);
        $member_id = $request->member_id;
        return response()->json([
            'status' => true,
            'view' => view('income-tax.arrears.form-table', compact('member', 'member_id', 'arrears'))->render(),
            'member' => $member,
        ]);
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
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'amt' => 'required|numeric',
            'cps' => 'required',
            'i_tax' => 'required|numeric',
            'cghs' => 'required',
            'gmc' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'date.required' => 'The date field is required.',
            'amt.required' => 'The amount field is required.',
            'amt.numeric' => 'The amount must be a number.',
            'cps.required' => 'The CPS field is required.',
            'i_tax.required' => 'The Income Tax field is required.',
            'i_tax.numeric' => 'The Income Tax must be a number.',
            'cghs.required' => 'The CGHS field is required.',
            'gmc.required' => 'The GMC field is required.',
        ]);

        $arrears = new Arrear();
        $arrears->member_id = $request->member_id;
        $arrears->date = $request->date;
        $arrears->name = $request->name;
        $arrears->amt = $request->amt;
        $arrears->cps = $request->cps;
        $arrears->i_tax = $request->i_tax;
        $arrears->cghs = $request->cghs;
        $arrears->gmc = $request->gmc;
        $arrears->save();

        $arrears = Arrear::with('member')->orderBy('id', 'desc')->where('member_id', $request->member_id)->paginate(10);
        $member_id = $request->member_id;

        return response()->json([
            'status' => true,
            'message' => 'Arrears added successfully',
            'view' => view('income-tax.arrears.table', compact('arrears', 'member_id'))->render(),
        ]);
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
        $edit = true;
        $arrear = Arrear::with('member')->find($id);
        $members = Member::where('e_status', 'active')->orderBy('id', 'desc')->get();
        $member_id = $arrear->member_id;
        return response()->json([
            'status' => true,
            'view' => view('income-tax.arrears.form', compact('edit', 'arrear', 'members', 'member_id'))->render(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'amt' => 'required|numeric',
            'cps' => 'required',
            'i_tax' => 'required|numeric',
            'cghs' => 'required',
            'gmc' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'date.required' => 'The date field is required.',
            'amt.required' => 'The amount field is required.',
            'amt.numeric' => 'The amount must be a number.',
            'cps.required' => 'The CPS field is required.',
            'i_tax.required' => 'The Income Tax field is required.',
            'i_tax.numeric' => 'The Income Tax must be a number.',
            'cghs.required' => 'The CGHS field is required.',
            'gmc.required' => 'The GMC field is required.',
        ]);

        $arrear = Arrear::find($id);
        $arrear->member_id = $request->member_id;
        $arrear->date = $request->date;
        $arrear->name = $request->name;
        $arrear->amt = $request->amt;
        $arrear->cps = $request->cps;
        $arrear->i_tax = $request->i_tax;
        $arrear->cghs = $request->cghs;
        $arrear->gmc = $request->gmc;
        $arrear->save();

        $members = Member::where('e_status', 'active')->orderBy('id', 'desc')->where('id', $request->member_id)->paginate(10);

        $member_id = $request->member_id;

        return response()->json([
            'status' => true,
            'message' => 'Arrears updated successfully',
            'view' => view('income-tax.arrears.table-td', compact('arrear', 'member_id'))->render(),
            'view2' => view('income-tax.arrears.form', compact('members', 'member_id'))->render(),
            'id' => $arrear->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
