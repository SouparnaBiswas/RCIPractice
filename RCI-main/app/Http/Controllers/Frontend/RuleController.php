<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rule;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rules = Rule::orderBy('id', 'desc')->paginate(10);
        return view('frontend.rules.list', compact('rules'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $rules = Rule::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('rule_name', 'like', '%' . $query . '%')
                    ->orWhere('f_basic', 'like', '%' . $query . '%')
                    ->orWhere('t_basic', 'like', '%' . $query . '%')
                    ->orWhere('percent', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('f_scale', 'like', '%' . $query . '%')
                    ->orWhere('t_scale', 'like', '%' . $query . '%');
                
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
        
            return response()->json(['data' => view('frontend.rules.table', compact('rules'))->render()]);
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
            'rule_name' => 'required|max:255',
            'month' => 'required',
            'year' => 'required',
            'f_basic' => 'required',
            't_basic' => 'required',
            'percent' => 'required',
            'amount' => 'required',
            'f_gross' => 'required',
            't_gross' => 'required',
            'f_scale' => 'required',
            't_scale' => 'required',
        ]);
        

        $rule_add = new Rule();
        $rule_add->rule_name = $request->rule_name;
        $rule_add->month =  $request->month;
        $rule_add->year = $request->year;
        $rule_add->f_basic = $request->f_basic;
        $rule_add->t_basic = $request->t_basic;
        $rule_add->percent = $request->percent;
        $rule_add->amount = $request->amount;
        $rule_add->f_gross = $request->f_gross;
        $rule_add->t_gross = $request->t_gross;
        $rule_add->f_scale = $request->f_scale;
        $rule_add->t_scale = $request->t_scale;
        $rule_add->more_info = $request->more_info;
        $rule_add->save();

        session()->flash('message', 'Rule added successfully');
        return response()->json(['success' => 'Rule added successfully']);
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
        $rule = Rule::find($id);
        $edit = true;

        return response()->json(['view' => view('frontend.rules.form', compact('edit', 'rule'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rule_name' => 'required|max:255',
            'month' => 'required',
            'year' => 'required',
            'f_basic' => 'required',
            't_basic' => 'required',
            'percent' => 'required',
            'amount' => 'required',
            'f_gross' => 'required',
            't_gross' => 'required',
            'f_scale' => 'required',
            't_scale' => 'required',
        ]);
        

        $rule_edit = Rule::where('id',$request->rule_id)->first();
        $rule_edit->rule_name = $request->rule_name;
        $rule_edit->month =  $request->month;
        $rule_edit->year = $request->year;
        $rule_edit->f_basic = $request->f_basic;
        $rule_edit->t_basic = $request->t_basic;
        $rule_edit->percent = $request->percent;
        $rule_edit->amount = $request->amount;
        $rule_edit->f_gross = $request->f_gross;
        $rule_edit->t_gross = $request->t_gross;
        $rule_edit->f_scale = $request->f_scale;
        $rule_edit->t_scale = $request->t_scale;
        $rule_edit->more_info = $request->more_info;
        $rule_edit->update();

        session()->flash('message', 'Rule updated successfully');
        return response()->json(['success' => 'Rule updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
