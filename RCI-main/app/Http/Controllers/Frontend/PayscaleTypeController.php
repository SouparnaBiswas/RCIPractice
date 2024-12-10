<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PayscaleType;
use Illuminate\Http\Request;

class PayscaleTypeController extends Controller
{
    public function index()
    {
        $payscale_types = PayscaleType::orderBy('id', 'desc')->paginate(10);
        return view('frontend.payscale-types.list', compact('payscale_types'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $payscale_types = PayscaleType::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('payscale_type', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.payscale-types.table', compact('payscale_types'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'payscale_type' => 'required|max:255',
        ]);

        $payscale_type = new PayscaleType();
        $payscale_type->payscale_type = $request->payscale_type;
        $payscale_type->save();

        session()->flash('message', 'Payband Type added successfully');
        return response()->json(['success' => 'Payband Type added successfully']);
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
        $payscale_type = PayscaleType::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.payscale-types.form', compact('edit', 'payscale_type'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'payscale_type' => 'required|max:255',
        ]);

        $payscale_type = PayscaleType::find($id);
        $payscale_type->payscale_type = $request->payscale_type;
        $payscale_type->save();

        session()->flash('message', 'Payband Type updated successfully');
        return response()->json(['success' => 'Payband Type updated successfully']);
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
        $payscale_type = PayscaleType::find($id);
        $payscale_type->delete();
        return redirect()->back()->with('message', 'Payband Type deleted successfully');
    }
}
