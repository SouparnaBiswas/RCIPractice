<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hra;
use App\Models\PayCommission;
use Illuminate\Http\Request;

class HraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hras = Hra::paginate(10);
        $paycommissions = PayCommission::all();

        return view('frontend.hras.list', compact('hras', 'paycommissions'));
    }

    public function fetchdata(Request $request)
    {
        $sort_by = $request->get('sortby');
        $sort_type = $request->get('sorttype');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        $hras = Hra::where(function($queryBuilder) use ($query) {
            $queryBuilder->where('city_category', 'like', '%' . $query . '%')
                ->orWhere('percentage', 'like', '%' . $query . '%');
        })
        ->orderBy($sort_by, $sort_type)
        ->paginate(10);
        $paycommissions = PayCommission::all();

        return response()->json(['view' => view('frontend.hras.table', compact('hras', 'paycommissions'))->render()]);
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
            'city_category' => 'required',
            'percentage' => 'required',
            'pay_commission_id' => 'required',
        ]);

        $lastHra = Hra::where('city_category', $request->city_category)->latest()->first();

        $hra = new Hra();
        $hra->city_category = $request->city_category;
        $hra->percentage = $request->percentage;
        $hra->pay_commission_id = $request->pay_commission_id;
        $hra->status = $request->status;
        $hra->save();

        // make the older data inactive according to city category
        if($lastHra) {
            $lastHra->status = 0;
            $lastHra->update();
        }


        session()->flash('success', 'HRA created successfully.'); 
        return redirect()->route('hras.index')->with('success', 'HRA created successfully.');
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
        $hra = Hra::findOrFail($id);
        $paycommissions = PayCommission::all();
        $edit = true;

        return response()->json(['view' => view('frontend.hras.form', compact('hra', 'paycommissions', 'edit'))->render()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'city_category' => 'required',
            'percentage' => 'required',
            'pay_commission_id' => 'required',
        ]);

        $hra = Hra::findOrFail($id);
        $hra->city_category = $request->city_category;
        $hra->percentage = $request->percentage;
        $hra->pay_commission_id = $request->pay_commission_id;
        $hra->status = $request->status;
        $hra->update();

        session()->flash('success', 'HRA updated successfully.'); 
        return redirect()->route('hras.index')->with('success', 'HRA updated successfully.');
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
        $hra = Hra::findOrFail($id);
        $hra->delete();

        session()->flash('success', 'HRA deleted successfully.'); 
        return redirect()->route('hras.index')->with('success', 'HRA deleted successfully.');
    }
}
