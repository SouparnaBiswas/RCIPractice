<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentCategory;

class PaymentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentCategories = PaymentCategory::orderBy('id', 'desc')->paginate(10);
        return view('frontend.public-fund.payment-categories.list', compact('paymentCategories'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $paymentCategories = PaymentCategory::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.public-fund.payment-categories.table', compact('paymentCategories'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.public-fund.payment-categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $paymentCategory = new PaymentCategory();
        $paymentCategory->name = $request->name;
        $paymentCategory->status = $request->status;
        $paymentCategory->save();

        session()->flash('message', 'Payment Category added successfully');
        return response()->json(['success' => 'Payment Category added successfully']);
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
        $paymentCategory = PaymentCategory::findOrFail($id);
        $edit = true;
        return response()->json(['view' => view('frontend.public-fund.payment-categories.form', compact('edit','paymentCategory'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|',
            'status' => 'required|boolean',
        ]);

        $paymentCategory = PaymentCategory::findOrFail($id);
        $paymentCategory->name = $request->name;
        $paymentCategory->status = $request->status;
        $paymentCategory->save();

        session()->flash('message', 'Payment Category updated successfully');
        return response()->json(['success' => 'Payment Category updated successfully']);
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
        $paymentCategory = PaymentCategory::find($id);
        $paymentCategory->delete();
        return redirect()->back()->with('message', 'Payment Category deleted successfully');
    }
}
