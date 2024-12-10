<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemCode;
use App\Models\Member;
use App\Models\Uom;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\ItemCodeType;
use Illuminate\Support\Facades\Auth;


class ItemCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ItemCode::orderBy('id','desc')->paginate(10);
        $members = User::role('MATERIAL-MANAGER')->get();
        $item_classifications = ItemCodeType::orderBy('id','desc')->get();
        $uoms = Uom::all();

        return view('inventory.items.list',compact('items', 'members', 'uoms','item_classifications'));
    }

    public function fetchData(Request $request)
    {
    if ($request->ajax()) {
        $sort_by = $request->get('sortby', 'id'); // Default to 'id' if not provided
        $sort_type = $request->get('sorttype', 'asc'); // Default to 'asc' if not provided
        $query = $request->get('query', '');
        $created_by = $request->get('created_by');
        $date = $request->get('date_entry');

        // Create a query builder instance
        $itemsQuery = ItemCode::query();

        if ($query) {
            $query = str_replace(" ", "%", $query);
            $itemsQuery->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('code', 'like', '%' . $query . '%')
                    ->orWhere('uom', 'like', '%' . $query . '%')
                    ->orWhereHas('createdBy', function ($q) use ($query) {
                        $q->where('user_name', 'like', '%' . $query . '%');
                    })
                    ->orWhere('entry_date', 'like', '%' . $query . '%')
                    ->orWhere('item_type', 'like', '%' . $query . '%');
            });
            
        }

    
        if ($created_by) {
            $itemsQuery->whereHas('createdBy', function ($q) use ($created_by) {
                $q->where('user_name',  $created_by );
            });
        }

        if ($date) {
            $itemsQuery->where('entry_date', 'like', '%' . $date . '%');
        }

        // Apply sorting and pagination
        $items = $itemsQuery->orderBy($sort_by, $sort_type)->paginate(10);

        // Fetch members
         $members = User::role('MATERIAL-MANAGER')->get();
         $uoms = Uom::all();

        return response()->json([
            'data' => view('inventory.items.table', compact('items', 'members', 'uoms'))->render()
        ]);
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
            'item_code' =>  ['required', 'regex:/^\d{2}\.\d{2}\.(?![\s\S])/'],
            'uom' => 'required',
            'item_type' => 'required',
            'item_price' => 'required|numeric',
        ], [
            'item_code.regex' => 'Item Code must be in the format XX.XX., e.g. 01.01.'
        ]);

        $itemCode = ItemCode::latest()->first();
        if(isset($itemCode))
        {
            $serial_no = Str::substr($itemCode->code, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }

        $item_code = $request->item_code . str_pad($counter, 4, '0', STR_PAD_LEFT);

        $item_code_gen = new ItemCode();
        $item_code_gen->code = $item_code;
        $item_code_gen->description = $request->description;
        $item_code_gen->uom = $request->uom;
        $item_code_gen->item_type = $request->item_type;
        $item_code_gen->item_name = $request->item_name;
        $item_code_gen->item_price = $request->item_price;
        $item_code_gen->item_code_type_id = $request->item_code_type_id;
        $item_code_gen->member_id = Auth::user()->id;
        $item_code_gen->entry_date = date('Y-m-d');
        $item_code_gen->save();

        session()->flash('message', 'Item Code added successfully');
        return response()->json(['success' => 'Item Code added successfully']);
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
        
        $edit_item_code = ItemCode::find($id);
        $members = User::role('MATERIAL-MANAGER')->get();
        $uoms = Uom::all();
        $item_classifications = ItemCodeType::orderBy('id','desc')->get();
        $edit = true;
        return response()->json(['view' => view('inventory.items.form', compact('edit','edit_item_code', 'members', 'uoms','item_classifications'))->render()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_code' =>  'required', 
            'uom' => 'required',
            'item_type' => 'required', 
            'item_name' => 'required',
            'item_price' => 'required|numeric',
        ]);
        
        $item_code = ItemCode::find($id);
        $item_code->description = $request->description;
        $item_code->uom = $request->uom;
        $item_code->item_type = $request->item_type;
        $item_code->item_name = $request->item_name;
        $item_code->item_price = $request->item_price;
        $item_code->item_code_type_id = $request->item_code_type_id;
        $item_code->member_id = Auth::user()->id;
        $item_code->entry_date = date('Y-m-d');
        $item_code->update();

        session()->flash('message', 'Item Code updated successfully');
        return response()->json(['success' => 'Item Code updated successfully']);
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
       
        $item_code = ItemCode::find($id);
        $item_code->delete();
        
        return redirect()->back()->with('message', 'Item Code deleted successfully');
    }
}
