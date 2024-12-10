<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use App\Models\MemberIncomeTax;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberIncomeTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberIncomeTaxes = MemberIncomeTax::paginate(10);
        $members = Member::all();

        $startYear = 1958; 
        $currentYear = date('Y');
        
        $years = range($startYear, $currentYear);

        return view('frontend.member-info.member-income-taxes.list', compact('memberIncomeTaxes', 'members', 'years'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $memberIncomeTaxes = MemberIncomeTax::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('section', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('max_deduction', 'like', '%' . $query . '%')
                    ->orWhere('member_deduction', 'like', '%' . $query . '%')
                    ->orWhere('year', 'like', '%' . $query . '%')
                    ->orWhere('financial_year', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            $members = Member::all();

            $startYear = 1958; 
            $currentYear = date('Y');
            
            $years = range($startYear, $currentYear);

            return response()->json(['data' => view('frontend.member-info.member-income-taxes.table', compact('memberIncomeTaxes', 'members', 'years'))->render()]);
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
        $request->validate([
            'member_id' => 'required',
            'section' => 'required',
            'description' => 'required',
            'max_deduction' => 'required',
            'year' => 'required',
        ]);

        $currentDate = now();
        $currentYear = $currentDate->year;

        // Determine financial year based on your organization's fiscal year start
        $fiscalYearStartMonth = 4; // For example, April
        if ($currentDate->month < $fiscalYearStartMonth) {
            $financialYear = $currentYear - 1 . '-' . $currentYear;
        } else {
            $financialYear = $currentYear . '-' . ($currentYear + 1);
        }

        $memberIncomeTaxe = new MemberIncomeTax();
        $memberIncomeTaxe->member_id = $request->member_id;
        $memberIncomeTaxe->section = $request->section;
        $memberIncomeTaxe->description = $request->description;
        $memberIncomeTaxe->max_deduction = $request->max_deduction; 
        $memberIncomeTaxe->member_deduction = $request->member_deduction;
        $memberIncomeTaxe->year = $request->year;
        $memberIncomeTaxe->financial_year = $financialYear;
        $memberIncomeTaxe->save();

        session()->flash('success', 'Member Income Tax created successfully.');
        return redirect()->route('member-income-taxes.index')->with('success', 'Member Income Tax created successfully.');
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
        $memberIncomeTax = MemberIncomeTax::findOrFail($id);
        $members = Member::all();
        $edit = true;

        $startYear = 1958; // Change this to your desired start year
        $currentYear = date('Y');
        
        $years = range($startYear, $currentYear);

        return response()->json([
            'view' => view('frontend.member-info.member-income-taxes.form', compact('memberIncomeTax', 'edit', 'members', 'years'))->render()
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'section' => 'required',
            'description' => 'required',
            'max_deduction' => 'required',
            // 'year' => 'required',
        ]);

        $memberIncomeTax = MemberIncomeTax::findOrFail($id);
        // $memberIncomeTax->member_id = $request->member_id;
        $memberIncomeTax->section = $request->section;
        $memberIncomeTax->description = $request->description;
        $memberIncomeTax->max_deduction = $request->max_deduction;
        $memberIncomeTax->member_deduction = $request->member_deduction;
        // $memberIncomeTax->year = $request->year;
        // $memberIncomeTax->financial_year = $request->financial_year;
        $memberIncomeTax->update();

        session()->flash('success', 'Member Income Tax updated successfully.');
        return redirect()->route('member-income-taxes.index')->with('success', 'Member Income Tax updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $memberIncomeTax = MemberIncomeTax::findOrFail($id);
        $memberIncomeTax->delete();

        return redirect()->route('member-income-taxes.index')->with('success', 'Member Income Tax deleted successfully.');
    }
}
