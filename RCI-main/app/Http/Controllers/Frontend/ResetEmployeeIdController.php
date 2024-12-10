<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResetEmployeeId;

class ResetEmployeeIdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reset_employee_ids = ResetEmployeeId::orderBy('id', 'desc')->paginate(10);
        return view('frontend.reset-employee-ids.list', compact('reset_employee_ids'));
    }

    public function fetchData(Request $request)
    {
       
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $reset_employee_ids = ResetEmployeeId::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('employee_id_text', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return view('frontend.reset-employee-ids.table', compact('reset_employee_ids'))->render();
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
            'employee_id_text' => 'required|string|max:255',
            'status' => 'required',
        ]);
        $reset_employee_id = new ResetEmployeeId();
        $reset_employee_id->employee_id_text = $request->employee_id_text;
        $reset_employee_id->status = $request->status;

        if($reset_employee_id->save()) {
            $lastSavedEmployeeId = ResetEmployeeId::latest()->value('id');
            ResetEmployeeId::where('id', '!=', $lastSavedEmployeeId)->update(['status' => 0]);
        }

        session()->flash('message', 'Employee-Id text added successfully');
        return response()->json(['success' => 'Employee-Id text added successfully']);
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

    public function delete($id)
    {

        if(ResetEmployeeId::where('id', $id)->where('status', 1)->exists()) {
            return redirect()->back()->with(['error' => 'This Employee-Id text is active, you can not delete this.']);
        }

        $reset_employee_id = ResetEmployeeId::find($id);
        $reset_employee_id->delete();

        return redirect()->back()->with('message', 'Employee-Id text deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
