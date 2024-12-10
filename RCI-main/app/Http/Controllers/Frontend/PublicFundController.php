<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicFundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('frontend.public-funds.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.public-funds.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vr_no' => 'required',
            'vr_date' => 'required',
            'sr_no' => 'required',
            'amount' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'bill_ref' => 'required',
            'bank_account' => 'required',
            'dv_no' => 'required',
            'cheque_no' => 'required',
            'cheque_date' => 'required',
            'cheque_amt' => 'required', // 'cheque_amt' should be 'cheque_amount'
            'narration' => 'required',
            'category' => 'required',
            'cbre_no' => 'required',
            'cbre_date' => 'required',
            'cbpe_no' => 'required',
            'cbpe_date' => 'required',
            'ct_no' => 'required',
            'pay_amt' => 'required',
        ]);

        $public_fund = new PublicFund();

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
