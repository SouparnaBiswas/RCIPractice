<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Member;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::orderBy('id', 'desc')->paginate(10);
        return view('frontend.group.list', compact('groups'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $groups = Group::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.group.table', compact('groups'))->render()]);
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
            'value' => 'required|max:255',
            'status' => 'required',
        ]);

        $group_value = new Group();
        $group_value->value = $request->value;
        $group_value->status = $request->status;
        $group_value->save();

        session()->flash('message', 'Group added successfully');
        return response()->json(['success' => 'Group added successfully']);
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
        $group = Group::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.group.form', compact('edit','group'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'value' => 'required|max:255',
            'status' => 'required',
        ]);

        $group = Group::find($id);
        $group->value = $request->value;
        $group->status = $request->status;
        $group->save();

        session()->flash('message', 'Group updated successfully');
        return response()->json(['success' => 'Group updated successfully']);
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
        $related_members = Member::where('group', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'Group is related to members.Please remove the relation first.');
        } else {
            $group = Group::find($id);
            $group->delete();
            return redirect()->back()->with('message', 'Group deleted successfully');
        }
    }
}
