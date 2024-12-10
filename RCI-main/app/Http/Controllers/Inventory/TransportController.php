<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transports = Transport::orderBy('id', 'desc')->paginate(10);
        return view('inventory.transports.list', compact('transports'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $transports = Transport::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('phone', 'like', '%' . $query . '%')
                    ->orWhere('address', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.transports.table', compact('transports'))->render()]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:transports,email',
            'phone' => 'required|string|max:15|unique:transports,phone',
            'address' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $transport = new Transport();
        $transport->name = $request->name;
        $transport->email = $request->email;
        $transport->phone = $request->phone;
        $transport->address = $request->address;
        $transport->status = $request->status;
        $transport->save();

        session()->flash('success', 'Transport created successfully');
        return response()->json(['success' => 'Transport created successfully']);
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
        $transport = Transport::findOrFail($id);
        $edit = true;
        return response()->json(['view' => view('inventory.transports.form', compact('transport', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $transport = Transport::findOrFail($id);
        $transport->name = $request->name;
        $transport->email = $request->email;
        $transport->phone = $request->phone;
        $transport->address = $request->address;
        $transport->status = $request->status;
        $transport->update();

        session()->flash('success', 'Transport updated successfully');
        return response()->json(['success' => 'Transport updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
