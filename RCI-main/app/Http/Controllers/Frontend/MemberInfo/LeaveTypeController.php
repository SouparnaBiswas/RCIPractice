<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaveTypes = LeaveType::paginate(10);

        return view('frontend.member-info.leaveType.list', compact('leaveTypes'));
    }

    public function fetchData(Request $request)
    {
        if($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $leaveTypes = LeaveType::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('leave_type', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.member-info.leaveType.table', compact('leaveTypes'))->render()]);
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
            'leave_type' => 'required|unique:leave_types,leave_type',
        ]);

        $leaveType = new LeaveType();
        $leaveType->leave_type = $request->leave_type;
        $leaveType->leave_type_abbr = $request->leave_type_abbr;
        $leaveType->status = $request->status;
        $leaveType->save();

        session()->flash('success', 'Leave Type created successfully!');
        return redirect()->route('leave-type.index')->with('success', 'Leave Type created successfully!');
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
        $leaveType = LeaveType::findOrFail($id);
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.leaveType.form', compact('leaveType', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'leave_type' => 'required',
        ]);

        $leaveType = LeaveType::findOrFail($id);
        $leaveType->leave_type = $request->leave_type;
        $leaveType->leave_type_abbr = $request->leave_type_abbr;
        $leaveType->status = $request->status;
        $leaveType->update();

        session()->flash('success', 'Leave Type updated successfully!');
        return redirect()->route('leave-type.index')->with('success', 'Leave Type updated successfully!');
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
        $leaveType = LeaveType::findOrFail($id);
        $leaveType->delete();

        session()->flash('success', 'Leave Type deleted successfully!');
        return redirect()->route('leave-type.index')->with('success', 'Leave Type deleted successfully!');
    }
}
