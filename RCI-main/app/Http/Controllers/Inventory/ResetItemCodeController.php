<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResetItemCode;

class ResetItemCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reset_item_codes = ResetItemCode::orderBy('id','desc')->paginate(10);
        return view('inventory.reset-item-codes.list',compact('reset_item_codes'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $reset_item_codes = ResetItemCode::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('item_code', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.reset-item-codes.table', compact('reset_item_codes'))->render()]);
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
        // validation
        $request->validate([
            'item_code_text' => 'required',
            'status' => 'required',
        ]);

        $reset_item_code = new ResetItemCode();
        $reset_item_code->item_code_text = $request->item_code_text;
        $reset_item_code->status = $request->status;
        $reset_item_code->save();

        session()->flash('message', 'Reset Code Text added successfully');
        return response()->json(['success' => 'Reset Code Text added successfully']);

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
