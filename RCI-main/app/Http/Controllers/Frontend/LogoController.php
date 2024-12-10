<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteLogo;
use Illuminate\Support\Facades\Validator;

class LogoController extends Controller
{
    //

    public function dashboardLogo(Request $request)
    {
        $logo = SiteLogo::first();
        return view('frontend.change-logo',compact('logo'));
    }

    public function logoUpdate(Request $request)
    {
        
        $this->validate($request, [
            'logo' => 'required',
        ]);
        if ($request->hasFile('logo')) {
           
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $image_path = $request->file('logo')->store('logo', 'public');
            $check_logo = SiteLogo::first();
            if($check_logo){
                $insert_logo = SiteLogo::find($check_logo->id);
                $insert_logo->logo = $image_path;
                $insert_logo->update(); 
            }else{
                $logo_insert = new SiteLogo();
                $logo_insert->logo = $image_path;
                $logo_insert->save();
            }
           
        }

        return redirect()->back()->with('message', 'Logo updated successfully');
    }
}
