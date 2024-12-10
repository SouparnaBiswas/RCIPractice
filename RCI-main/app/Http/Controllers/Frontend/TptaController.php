<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PmLevel;
use Illuminate\Http\Request;
use App\Models\Tpta;
use App\Models\DearnessAllowancePercentage;

class TptaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tptas = Tpta::paginate(10);
        $payLevels = PmLevel::all();

        return view('frontend.tptas.list', compact('tptas', 'payLevels'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $tptas = Tpta::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('tpt_type', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            $payLevels = PmLevel::all();

            return response()->json(['data' => view('frontend.tptas.table', compact('tptas', 'payLevels'))->render()]);
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
            'pay_level_id' => 'required',
            'tpt_type' => 'required',
            'tpt_allowance' => 'required',
            'tpt_da' => 'required',
        ]);

        $lastTptaData = Tpta::where('tpt_type', $request->tpt_type)->where('pay_level_id', $request->pay_level_id)->latest()->first();

        $tpta = new Tpta();
        $tpta->pay_level_id = $request->pay_level_id;
        $tpta->tpt_type = $request->tpt_type;
        $tpta->tpt_allowance = $request->tpt_allowance;
        $tpta->tpt_da = $request->tpt_da;
        $tpta->status = $request->status;
        $tpta->save();

        // update the old datas inactive
        if ($lastTptaData) {
            $lastTptaData->status = 0;
            $lastTptaData->update();
        }

        session()->flash('message', 'TPTA created successfully');
        return response()->json(['success' => 'TPTA created successfully']);
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
        $tpta = Tpta::findOrFail($id);
        $payLevels = PmLevel::all();
        $edit = true;

        return response()->json(['view' => view('frontend.tptas.form', compact('tpta', 'payLevels', 'edit'))->render(), 'tpta' => $tpta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pay_level_id' => 'required',
            'tpt_type' => 'required',
            'tpt_allowance' => 'required',
            'tpt_da' => 'required',
        ]);

        $tpta = Tpta::findOrFail($id);
        $tpta->pay_level_id = $request->pay_level_id;
        $tpta->tpt_type = $request->tpt_type;
        $tpta->tpt_allowance = $request->tpt_allowance;
        $tpta->tpt_da = $request->tpt_da;
        $tpta->status = $request->status;
        $tpta->update();

        session()->flash('message', 'TPTA updated successfully');
        return response()->json(['success' => 'TPTA updated successfully']);
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
        $tpta = Tpta::findOrFail($id);
        $tpta->delete();

        return redirect()->back()->with('message', 'TPTA deleted successfully');
    }

    public function daPercentageCalculation(Request $request)
    {
        $daPercentage = DearnessAllowancePercentage::where('is_active', 1)->first();
        $allowance = $request->allowance;

        $daAmount = ($allowance * $daPercentage->percentage) / 100;

        return response()->json(['tpt_da' => $daAmount]);
    }
}
