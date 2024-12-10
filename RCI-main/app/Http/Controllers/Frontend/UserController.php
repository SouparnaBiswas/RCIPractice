<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['ADMIN']);
        })->orderBy('id', 'desc')->paginate(15);
        $roles = Role::where('name', '!=', 'ADMIN')->get();
        return view('frontend.new-user.list',compact('users','roles'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $users = User::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('user_name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('phone', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.new-user.table', compact('users'))->render()]);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'status' => 'required',
        ]);

        //find role name from id
        $role = Role::find($request->role);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->first_name .' '. $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->save();

        $user->assignRole($role->name);

        session()->flash('message', 'New User added successfully');
        return response()->json(['success' => 'New User added successfully']);
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
        $user_detail = User::find($id);
        $role_id = $user_detail->roles->first()->id;
        $roles = Role::where('name', '!=', 'ADMIN')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.new-user.form', compact('user_detail','role_id','edit','roles'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required',
            'status' => 'required',
        ]);

        //find role name from id
        $role = Role::find($request->role);

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->first_name .' '. $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = $request->status;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        $user->update();

        $user->syncRoles([$role->name]);

        session()->flash('message', 'User updated successfully');
        return response()->json(['success' => 'User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('message', 'User deleted successfully');
    }
}
