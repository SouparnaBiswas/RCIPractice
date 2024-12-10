<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payscale;
use App\Models\PayscaleType;
use Illuminate\Http\Request;

class PayscaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payscale_types = PayscaleType::orderBy('payscale_type', 'asc')->get();
        $payscales = Payscale::orderBy('id', 'desc')->paginate(10);
        return view('frontend.payscales.list', compact('payscales','payscale_types'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $payscales = Payscale::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('payscale_number', 'like', '%' . $query . '%')
                    ->orWhere('basic1', 'like', '%' . $query . '%')
                    ->orWhere('basic2', 'like', '%' . $query . '%')
                    ->orWhere('basic3', 'like', '%' . $query . '%')
                    ->orWhere('increment1', 'like', '%' . $query . '%')
                    ->orWhere('increment2', 'like', '%' . $query . '%')
                    ->orWhereHas('payscaleType', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('payscale_type', 'like', '%' . $query . '%');
                    });
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);


            return response()->json(['data' => view('frontend.payscales.table', compact('payscales'))->render()]);
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
            'payscale_type_id' => 'required',
            // pattern example: 45555-555-55555
            'payscale_number' => 'required|regex:/^\d{5}-\d{3}-\d{5}$/|unique:payscales,payscale_number',
            'basic1' => 'required|numeric',
            'increment1' => 'required|numeric',
            'increment2' => 'required|numeric',
        ],[
            'payscale_number.regex' => 'Payscale number must be in the format 45555-555-55555',
        ]);

        $payscale = new Payscale();
        $payscale->payscale_type_id = $request->payscale_type_id;
        $payscale->payscale_number = $request->payscale_number;
        $payscale->basic1 = $request->basic1;
        $payscale->increment1 = $request->increment1;
        $payscale->increment2 = $request->increment2;
        $payscale->save();

        session()->flash('message', 'Payscale added successfully');
        return response()->json(['success' => 'Payscale added successfully']);
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
        $payscale_types = PayscaleType::orderBy('payscale_type', 'asc')->get();
        $payscale = Payscale::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.payscales.form', compact('edit', 'payscale','payscale_types'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'payscale_type_id' => 'required',
            'payscale_number' => 'required|regex:/^\d{5}-\d{3}-\d{5}$/|unique:payscales,payscale_number,' . $id, // ignore the unique rule for this id
            'basic1' => 'required|numeric',
            'increment1' => 'required|numeric',
            'increment2' => 'required|numeric',
        ],[
            'payscale_number.regex' => 'Payscale number must be in the format 45555-555-55555',
        ]);

        $payscale = Payscale::find($id);
        $payscale->payscale_type_id = $request->payscale_type_id;
        $payscale->payscale_number = $request->payscale_number;
        $payscale->basic1 = $request->basic1;
        $payscale->increment1 = $request->increment1;
        $payscale->increment2 = $request->increment2;
        $payscale->save();

        session()->flash('message', 'Payscale updated successfully');
        return response()->json(['success' => 'Payscale updated successfully']);
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
        $payscale = Payscale::find($id);
        $payscale->delete();
        return redirect()->back()->with('message', 'Payscale deleted successfully');
    }
}
