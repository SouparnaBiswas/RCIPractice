<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pg;
use App\Models\Member;

class PgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pgs = Pg::orderBy('id', 'desc')->paginate(10);
        return view('frontend.pg.list',compact('pgs'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $pgs = Pg::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.pg.table', compact('pgs'))->render()]);
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

        $pg_value = new Pg();
        $pg_value->value = $request->value;
        $pg_value->status = $request->status;
        $pg_value->save();

        session()->flash('message', 'Pg added successfully');
        return response()->json(['success' => 'Pg added successfully']);
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
        $pg = Pg::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.pg.form', compact('edit','pg'))->render()]);
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

        $pg = Pg::find($id);
        $pg->value = $request->value;
        $pg->status = $request->status;
        $pg->save();

        session()->flash('message', 'PG updated successfully');
        return response()->json(['success' => 'PG updated successfully']);
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
        $related_members = Member::where('pg', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'PG is related to members.Please remove the relation first.');
        } else {
            $pg = Pg::find($id);
            $pg->delete();
            return redirect()->back()->with('message', 'PG deleted successfully');
        }
    }
}
