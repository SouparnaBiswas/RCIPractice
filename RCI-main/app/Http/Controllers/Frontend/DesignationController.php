<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Designation;
use App\Models\DesignationType;
use App\Models\Payband;
use App\Models\PmLevel;
use App\Models\PaybandType;
use App\Models\Payscale;
use App\Models\PayscaleType;
use App\Models\Group;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::orderBy('id', 'desc')->paginate(10);
        $designation_types = DesignationType::orderBy('designation_type', 'asc')->get();
        $categories = Category::orderBy('category', 'asc')->get();
        $payband_types = PaybandType::orderBy('payband_type', 'asc')->get();
        $pay_levels = PmLevel::orderBy('id', 'desc')->get();
        $payscale_types = PayscaleType::orderBy('payscale_type', 'asc')->get();
        $groups = Group::orderBy('id','asc')->get();
        return view('frontend.designations.list', compact('designations', 'designation_types', 'categories', 'payband_types', 'payscale_types','pay_levels','groups'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $designations = Designation::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('full_name', 'like', '%' . $query . '%')
                    ->orWhere('designation', 'like', '%' . $query . '%')
                    ->orWhereHas('designationType', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('designation_type', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('paybandType', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('payband_type', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('payscaleType', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('payscale_type', 'like', '%' . $query . '%');
                    })
                    ->orwhereHas('category', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('category', 'like', '%' . $query . '%');
                    });
            })->orderBy($sort_by, $sort_type)->paginate(10);

            return response()->json(['data' => view('frontend.designations.table', compact('designations'))->render()]);
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
            'full_name' => 'required|max:255',
            'designation' => 'required|max:255',
            'group_id' => 'required',
            'order' => 'required|numeric',
        ]);

        $designation = new Designation();
        $designation->full_name = $request->full_name;
        $designation->designation = $request->designation;
        $designation->group_id = $request->group_id;
        $designation->category_id = $request->category_id;
        $designation->payband_type_id = $request->payband_type_id;
        $designation->pay_level_id = $request->pay_level_id;
        $designation->order = $request->order;
        $designation->type = $request->designation_type;
        $designation->save();

        session()->flash('message', 'Designation added successfully');
        return response()->json(['success' => 'Designation added successfully']);
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
        $designation = Designation::find($id);
        $edit = true;
        $designation_types = DesignationType::orderBy('designation_type', 'asc')->get();
        $categories = Category::orderBy('category', 'asc')->get();
        $payband_types = PaybandType::orderBy('payband_type', 'asc')->get();
        $payscale_types = PayscaleType::orderBy('payscale_type', 'asc')->get();

        $pay_levels = PmLevel::orderBy('id', 'desc')->get();
        $groups = Group::orderBy('id','asc')->get();
        return response()->json(['view' => view('frontend.designations.form', compact('edit', 'designation', 'designation_types', 'categories', 'payband_types', 'payscale_types','pay_levels','groups'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'full_name' => 'required|max:255',
            'designation' => 'required|max:255',
            'group_id' => 'required',
            'order' => 'required|numeric',
        ]);

        $designation = Designation::find($id);
        $designation->full_name = $request->full_name;
        $designation->designation = $request->designation;
        $designation->group_id = $request->group_id;
        $designation->category_id = $request->category_id;
        $designation->payband_type_id = $request->payband_type_id;
        $designation->pay_level_id = $request->pay_level_id;
        $designation->order = $request->order;
        $designation->type = $request->designation_type;
        $designation->save();

        session()->flash('message', 'Designation updated successfully');
        return response()->json(['success' => 'Designation updated successfully']);
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
        $designation = Designation::find($id);
        $designation->delete();
        session()->flash('message', 'Designation deleted successfully');
        return redirect()->back();
    }

    public function getPayscaleType(Request $request)
    {
         $payscale_type = Payscale::where('payscale_type_id', $request->payscale_type_id)->orderBy('id', 'desc')->first();
        return response()->json(['payscale_type' => $payscale_type]);
    }
}
