<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CdaReceiptDetail;

class CdaReceiptDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cdaReceiptDetails = CdaReceiptDetail::orderBy('id', 'desc')->paginate(10);
        return view('imprest.cda-receipt-details.list', compact('cdaReceiptDetails'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cdaReceiptDetails = CdaReceiptDetail::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('details', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('imprest.cda-receipt-details.table', compact('cdaReceiptDetails'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('imprest.cda-receipt-details.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'details' => 'required',
            'status' => 'required',
        ]);

        $cdaReceiptDetail = new CdaReceiptDetail();
        $cdaReceiptDetail->details = $request->details;
        $cdaReceiptDetail->status = $request->status;
        $cdaReceiptDetail->save();

        session()->flash('message', 'CDA receipt details added successfully');
        return response()->json(['success' => 'CDA receipt details added successfully']);
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
        $cdaReceiptDetail = CdaReceiptDetail::findOrFail($id);
        $edit = true;
        return response()->json(['view' => view('imprest.cda-receipt-details.form', compact('cdaReceiptDetail', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'details' => 'required|string',
        ]);

        $cdaReceiptDetail = CdaReceiptDetail::findOrFail($id);
        $cdaReceiptDetail->details = $request->details;
        $cdaReceiptDetail->status = $request->status;
        $cdaReceiptDetail->save();

        session()->flash('message', 'Cda receipt updated successfully');
        return response()->json(['success' => 'Cda receipt updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Delete record
     */

    public function delete(string $id)
    {
        $cdaReceiptDetail = CdaReceiptDetail::findOrFail($id);
        $cdaReceiptDetail->delete();

        return redirect()->route('cda-receipt-details.index')->with('message', 'CDA Receipt deleted successfully.');
    }
}
