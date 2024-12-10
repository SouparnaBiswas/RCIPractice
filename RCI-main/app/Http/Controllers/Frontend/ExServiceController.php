<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExService;
use App\Models\Member;

class ExServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exServices = ExService::orderBy('id', 'desc')->paginate(10);
        return view('frontend.ex-service.list',compact('exServices'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $exServices = ExService::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.ex-service.table', compact('exServices'))->render()]);
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

        $ex_service_value = new ExService();
        $ex_service_value->value = $request->value;
        $ex_service_value->status = $request->status;
        $ex_service_value->save();

        session()->flash('message', 'Ex Service added successfully');
        return response()->json(['success' => 'Ex Service added successfully']);
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
        $exService = ExService::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.ex-service.form', compact('edit','exService'))->render()]);
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

        $exService = ExService::find($id);
        $exService->value = $request->value;
        $exService->status = $request->status;
        $exService->save();

        session()->flash('message', 'Ex Service updated successfully');
        return response()->json(['success' => 'Ex Service updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
