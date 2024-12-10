<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::orderBy('id', 'desc')->paginate(10);
        return view('frontend.loans.list', compact('loans'));

    }

    public function fetchData(Request $request)
    {
       
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $loans = Loan::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('loan_name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.loans.table', compact('loans'))->render()]);
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
            'loan_name' => 'required',
            'status' => 'required',
        ]);

        $loan_value = new Loan();
        $loan_value->loan_name = $request->loan_name;
        $loan_value->status = $request->status;
        $loan_value->save();

        session()->flash('message', 'Loan added successfully');
        return response()->json(['success' => 'Loan added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $loan = Loan::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.loans.form', compact('edit','loan'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'loan_name' => 'required',
            'status' => 'required',
        ]);

        $loan = Loan::find($id);
        $loan->loan_name = $request->loan_name;
        $loan->status = $request->status;
        $loan->save();

        session()->flash('message', 'Loan updated successfully');
        return response()->json(['success' => 'Loan updated successfully']);
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
        $loan = Loan::find($id);
        $loan->delete();
        return redirect()->back()->with('message', 'Loan deleted successfully');
    }
}
