<?php

namespace App\Http\Controllers\PublicFund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicFundBank;

class PublicFundBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = PublicFundBank::orderBy('id', 'desc')->paginate(10);
        return view('public-funds.bank.list', compact('banks'));
    }

    public function fetchBankDetails(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $banks = PublicFundBank::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('bank_name', 'like', '%' . $query . '%')
                    ->orWhere('account_number', 'like', '%' . $query . '%')
                    ->orWhere('ifsc_code', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
        
            return response()->json(['data' => view('public-funds.bank.table', compact('banks'))->render()]);
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
