<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    //

    public function dashboard()
    {
        return view('inventory.dashboard');
    }
}
