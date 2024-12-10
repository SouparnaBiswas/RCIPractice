<?php

namespace App\Http\Controllers\PublicFund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicFundVendor;

class PublicFundVendorController extends Controller
{
    //

    public function index()
    {
        $fund_vendors = PublicFundVendor::orderBy('id', 'desc')->paginate(10);
        return view('public-funds.vendor.list', compact('fund_vendors'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $fund_vendors = PublicFundVendor::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('f_name', 'like', '%' . $query . '%')
                    ->orWhere('l_name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('phone', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
        
            return response()->json(['data' => view('public-funds.vendor.table', compact('fund_vendors'))->render()]);
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
            'f_name' => 'required',
            'l_name' => 'required',
            'phone' => 'required|numeric',
            'status' => 'required',
        ]);

        $public_fund_vendor = new PublicFundVendor();
        $public_fund_vendor->f_name = $request->f_name;
        $public_fund_vendor->l_name = $request->l_name;
        $public_fund_vendor->email = $request->email;
        $public_fund_vendor->phone = $request->phone;
        $public_fund_vendor->desig = $request->desig;
        $public_fund_vendor->status = $request->status;
        $public_fund_vendor->save();

        session()->flash('message', 'Public fund vendor added successfully');
        return response()->json(['success' => 'Public fund vendor added successfully']);
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
        $public_fund_vendor = PublicFundVendor::find($id);
        $edit = true;
        return response()->json(['view' => view('public-funds.vendor.form', compact('edit','public_fund_vendor'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'phone' => 'required|numeric',
            'status' => 'required',
        ]);

        $publi_vendor_update = PublicFundVendor::find($id);
        $publi_vendor_update->f_name = $request->f_name;
        $publi_vendor_update->l_name = $request->l_name;
        $publi_vendor_update->email = $request->email;
        $publi_vendor_update->phone = $request->phone;
        $publi_vendor_update->desig = $request->desig;
        $publi_vendor_update->status = $request->status;
        $publi_vendor_update->update();

        session()->flash('message', 'Public vendor updated successfully');
        return response()->json(['success' => 'Public vendor updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   
}
