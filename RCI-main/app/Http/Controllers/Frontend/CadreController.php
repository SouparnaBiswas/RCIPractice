<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadre;
use App\Models\Member;

class CadreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cadres = Cadre::orderBy('id', 'desc')->paginate(10);
        return view('frontend.cadre.list', compact('cadres'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cadres = Cadre::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.cadre.table', compact('cadres'))->render()]);
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

        $cadre_value = new Cadre();
        $cadre_value->value = $request->value;
        $cadre_value->status = $request->status;
        $cadre_value->save();

        session()->flash('message', 'Cadre added successfully');
        return response()->json(['success' => 'Cadre added successfully']);
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
        $cadre = Cadre::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.cadre.form', compact('edit','cadre'))->render()]);
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

        $cadre = Cadre::find($id);
        $cadre->value = $request->value;
        $cadre->status = $request->status;
        $cadre->update();

        session()->flash('message', 'Cadre updated successfully');
        return response()->json(['success' => 'Cadre updated successfully']);
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

        $related_members = Member::where('cadre', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'Cadre is related to members.Please remove the relation first.');
        } else {

            $cadre = Cadre::find($id);
            $cadre->delete();
            return redirect()->back()->with('message', 'Cadre deleted successfully');
        }
        
    }
}
