<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DesignationType;
use Illuminate\Http\Request;
use App\Models\Member;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designation_types = DesignationType::orderBy('designation_type', 'asc')->get();
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('frontend.categories.list', compact('categories','designation_types'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $categories = Category::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('category', 'like', '%' . $query . '%')
                    ->orWhereHas('designationType', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('designation_type', 'like', '%' . $query . '%');
                    })
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null))
                    ->orWhere('gazetted', '=', $query == 'Gazetted' ? 1 : ($query == 'Non-Gazetted' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);




            return response()->json(['data' => view('frontend.categories.table', compact('categories'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categories|max:255',
            'designation_type_id' => 'required',
            'gazetted' => 'required',
            'status' => 'required',
        ]);

        $category = new Category();
        $category->category = $request->category;
        $category->designation_type_id = $request->designation_type_id;
        $category->gazetted = $request->gazetted;
        $category->status = $request->status;
        $category->save();

        session()->flash('message', 'Category added successfully');
        return response()->json(['success' => 'Category added successfully']);
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
        $designation_types = DesignationType::orderBy('designation_type', 'asc')->get();
        $category = Category::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.categories.form', compact('edit', 'category','designation_types'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|max:255|unique:categories,category,' . $id,
            'designation_type_id' => 'required',
            'gazetted' => 'required',
            'status' => 'required',
        ]);

        $category = Category::find($id);
        $category->category = $request->category;
        $category->designation_type_id = $request->designation_type_id;
        $category->gazetted = $request->gazetted;
        $category->status = $request->status;
        $category->save();

        session()->flash('message', 'Category updated successfully');
        return response()->json(['success' => 'Category updated successfully']);
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
        $related_members = Member::where('category', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'Category is related to members.Please remove the relation first.');
        } else {
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('message', 'Category deleted successfully');
        }
    }
}
