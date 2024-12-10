<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GstPercentage;

class GstController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gstpercentages = GstPercentage::paginate(10);
        return view('inventory.gst.list', compact('gstpercentages'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $gstpercentages = GstPercentage::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('gst_percent', 'like', '%' . $query . '%')
                    ->orWhere('gst_desc', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.gst.table', compact('gstpercentages'))->render()]);
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
            'gst_percent' => 'required',
            'gst_desc' => 'required',
        ]);

        $gstpercentage = new GstPercentage();
        $gstpercentage->gst_percent = $request->gst_percent;
        $gstpercentage->gst_desc = $request->gst_desc;
        $gstpercentage->status = $request->status;
        $gstpercentage->save();

        session()->flash('success', 'GST Percentage created successfully');
        return response()->json(['success' => 'GST Percentage created successfully']);
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
        $gst = GstPercentage::findOrFail($id);
        $edit = true;

        return response()->json(['view' => view('inventory.gst.form', compact('gst', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gstpercentage = GstPercentage::findOrFail($id);
        $gstpercentage->gst_percent = $request->gst_percent;
        $gstpercentage->gst_desc = $request->gst_desc;
        $gstpercentage->status = $request->status;
        $gstpercentage->update();

        session()->flash('success', 'GST Percentage updated successfully');
        return response()->json(['success' => 'GST Percentage updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
