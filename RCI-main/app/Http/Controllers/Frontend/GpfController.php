<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gpf;
use App\Helpers\Helper;

class GpfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gpfs = Gpf::orderBy('id', 'desc')->paginate(10);
        return view('frontend.gpfs.list',compact('gpfs'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $gpfs = Gpf::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('current_rate', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.gpfs.table', compact('gpfs'))->render()]);
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
            'current_rate' => 'required|max:255',
            'status' => 'required',
        ]);

        Gpf::where('status', 1)->update(['status' => 0]);

        $gpf_value = new Gpf();
        $gpf_value->current_rate = $request->current_rate;
        $gpf_value->status = $request->status;
        $gpf_value->save();

        session()->flash('message', 'GPF added successfully');
        return response()->json(['success' => 'GPF added successfully']);
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
        $gpf = Gpf::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.gpfs.form', compact('edit','gpf'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'current_rate' => 'required|max:255',
            'status' => 'required',
        ]);

        $gpf_value = Gpf::find($id);
        $gpf_value->current_rate = $request->current_rate;
        $gpf_value->status = $request->status;
        $gpf_value->save();

        session()->flash('message', 'GPF updated successfully');
        return response()->json(['success' => 'GPF updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
