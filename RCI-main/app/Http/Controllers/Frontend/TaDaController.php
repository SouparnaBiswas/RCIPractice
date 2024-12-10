<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\TadaCategoryAllowance;

class TaDaController extends Controller
{

    public function index(){
       $data = TadaCategoryAllowance::paginate(5);
       $category = Category::where('status', '1')->get();
       return view('frontend.tada.tada-list',compact('category','data'));
    }

    public function fetchdata(Request $request)
    {
        $sort_by = $request->get('sortby');
        $sort_type = $request->get('sorttype');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        $data = TadaCategoryAllowance::where(function($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'like', '%' . $query . '%')
                ->orWhere('purpose', 'like', '%' . $query . '%');
        })
        ->orderBy($sort_by, $sort_type)
        ->paginate(5);
        $category = Category::where('status', '1')->get();

        return response()->json(['view' => view('frontend.tada.tada-table', compact('category','data'))->render()]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'amount' => 'required',
            'purpose' => 'required',
        ]);

        $tada = new TadaCategoryAllowance();
        $tada->category_id = $request->category_id;
        $tada->title = $request->title;
        $tada->purpose = $request->purpose;
        $tada->amount = $request->amount;
        $tada->payment_type = $request->payment_type;
        $tada->currency = $request->currency;
        $tada->status = $request->status;
        $tada->created_at = now();
        $tada->save();

        session()->flash('success', 'Data Stored successfully.');
        return redirect()->route('tada.index')->with('success', 'Data Stored successfully.');
    }


    public function edit(string $id)
    {
        $data = TadaCategoryAllowance::findOrFail($id);
        $category = Category::where('status', '1')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.tada.tada-form', compact('category','data', 'edit'))->render()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'amount' => 'required',
            'purpose' => 'required',
        ]);

        $tada = TadaCategoryAllowance::findOrFail($id);
        $tada->category_id = $request->category_id;
        $tada->title = $request->title;
        $tada->purpose = $request->purpose;
        $tada->amount = $request->amount;
        $tada->payment_type = $request->payment_type;
        $tada->currency = $request->currency;
        $tada->status = $request->status;
        $tada->update();

        session()->flash('success', 'Data updated successfully.');
        return redirect()->route('tada.index')->with('success', 'Data updated successfully.');
    }


    public function delete(string $id)
    {
        $data = TadaCategoryAllowance::findOrFail($id);
        $data->delete();

        session()->flash('success', 'Data deleted successfully.');
        return redirect()->route('tada.index')->with('success', 'Data deleted successfully.');
    }

}
