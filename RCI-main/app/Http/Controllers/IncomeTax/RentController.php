<?php

namespace App\Http\Controllers\IncomeTax;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::where('e_status', 'active')->orderBy('id', 'desc')->get();
        $financialYears = Helper::getFinancialYears();
        // $rents = Rent::with('member')->orderBy('id', 'desc')->paginate(10);
        return view('income-tax.rents.index')->with(compact('members', 'financialYears'));
    }

    public function fetchData(Request $request)
    {
        $rents = Rent::with('member')->orderBy('id', 'desc')->where('member_id', $request->member_id)->paginate(10);
        $member_id = $request->member_id;
        return response()->json([
            'status' => true,
            'view' => view('income-tax.rents.table', compact('rents', 'member_id'))->render(),
        ]);
    }

    public function memberDetails(Request $request)
    {
        $member = Member::with(['designation', 'divisions', 'groups'])->find($request->member_id);
        $rents = Rent::where('member_id', $request->member_id)->orderBy('id', 'desc')->paginate(10);
        $member_id = $request->member_id;
        return response()->json([
            'status' => true,
            'view' => view('income-tax.rents.form-table', compact('member', 'member_id', 'rents'))->render(),
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
            'month' => 'required',
            'year'  => 'required',
            'rent'  => 'required',
        ]);

        $rents = new Rent();
        $rents->member_id = $request->member_id;
        $rents->month = $request->month;
        $rents->year = $request->year;
        $rents->rent = $request->rent;
        $rents->save();

        $rents = Rent::with('member')->orderBy('id', 'desc')->where('member_id', $request->member_id)->paginate(10);
        $member_id = $request->member_id;

        return response()->json([
            'status' => true,
            'message' => 'Rents added successfully',
            'view' => view('income-tax.rents.table', compact('rents', 'member_id'))->render(),
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
        $rent = Rent::with('member')->find($id);
        $members = Member::where('e_status', 'active')->orderBy('id', 'desc')->get();
        $member_id = $rent->member_id;
        return response()->json([
            'status' => true,
            'view' => view('income-tax.rents.form', compact('edit', 'rent', 'members', 'member_id'))->render(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           'month' => 'required',
            'year'  => 'required',
            'rent'  => 'required',
        ]);

        $rent = Rent::find($id);
        $rent->member_id = $request->member_id;
        $rent->month = $request->month;
        $rent->year = $request->year;
        $rent->rent = $request->rent;
        $rent->save();

        $members = Member::where('e_status', 'active')->orderBy('id', 'desc')->where('id', $request->member_id)->paginate(10);

        $member_id = $request->member_id;

        return response()->json([
            'status' => true,
            'message' => 'Rents updated successfully',
            'view' => view('income-tax.rents.table-td', compact('rent', 'member_id'))->render(),
            'view2' => view('income-tax.rents.form', compact('members', 'member_id'))->render(),
            'id' => $rent->id,
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
