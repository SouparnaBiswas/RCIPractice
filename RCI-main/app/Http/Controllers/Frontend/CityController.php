<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::orderBy('id', 'desc')->paginate(10);
        return view('frontend.cities.list', compact('cities'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cities = City::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('city_type', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.cities.table', compact('cities'))->render()]);
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
            'name' => 'required|unique:cities|max:255',
            'city_type' => 'required',
            'status' => 'required',
            'tpt_type' => 'required',
        ]);
        
        $city = new City();
        $city->name = $request->name;
        $city->city_type = $request->city_type;
        $city->tpt_type = $request->tpt_type;
        $city->status = $request->status;
        $city->save();

        session()->flash('message', 'City added successfully');
        return response()->json(['success' => 'City added successfully']);
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
        $city = City::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.cities.form', compact('edit','city'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $city_update = City::find($id);
        $request->validate([
            'name' => 'required|max:255|unique:cities,name,'.$city_update->id,
            'city_type' => 'required',
            'status' => 'required',
            'tpt_type' => 'required',
        ]);

        $city_update->name = $request->name;
        $city_update->city_type = $request->city_type;
        $city_update->tpt_type = $request->tpt_type;
        $city_update->status = $request->status;
        $city_update->update();

        session()->flash('message', 'City updated successfully');
        return response()->json(['success' => 'City updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(Request $request)
    {
        $city = City::find($request->id);
        $city->delete();

        return redirect()->route('cities.index')->with('error', 'City deleted successfully');
    }
}
