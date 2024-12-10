<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::orderBy('id', 'desc')->paginate(10);
        return view('frontend.bank.list', compact('banks'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $banks = Bank::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('bank_name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
        
            return response()->json(['data' => view('frontend.bank.table', compact('banks'))->render()]);
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
            'bank_name' => 'required | max:255',
            'ifsc' => 'required | max:255',
            'status' => 'required',
        ]);

        $bank_value = new Bank();
        $bank_value->bank_name = $request->bank_name;
        $bank_value->ifsc = $request->ifsc;
        $bank_value->status = $request->status;
        $bank_value->save();

        session()->flash('message', 'Bank Information added successfully');
        return response()->json(['success' => 'bank Information added successfully']);
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
        $bank = Bank::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.bank.form', compact('edit','bank'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bank_name' => 'required|max:255',
            'ifsc' => 'required|max:255',
            'status' => 'required',
        ]);

        $bank = Bank::find($id);
        $bank->bank_name = $request->bank_name;
        $bank->ifsc = $request->ifsc;
        $bank->status = $request->status;
        $bank->update();

        session()->flash('message', 'Bank updated successfully');
        return response()->json(['success' => 'Bank updated successfully']);
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
        $bank = Bank::find($id);
        $bank->delete();
        return redirect()->back()->with('message', 'Bank deleted successfully');
    }
}
