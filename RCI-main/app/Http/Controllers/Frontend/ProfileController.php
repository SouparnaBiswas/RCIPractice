<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use ImageTrait;

    public function profile()
    {
        return view('frontend.profile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        if ($request->hasFile('profile_picture')) {
            $validator = Validator::make($request->all(), [
                'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Profile picture must be an image');
            }
        }

        $user = User::find(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                $currentImageFilename = $user->profile_picture; // get current image name
                Storage::delete('app/' . $currentImageFilename);
            }
            $user->profile_picture = $this->imageUpload($request->file('profile_picture'), 'user');
        }
        $user->save();
        return redirect()->back()->with('message', 'Profile updated successfully');
    }

    public function password()
    {
        return view('frontend.change-password');
    }

    public function passwordUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8|different:old_password',
            'confirm_password' => 'required|min:8|same:new_password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = User::find(Auth::user()->id);
        $data->password = Hash::make($request->new_password);
        $data->update();
        return redirect()->back()->with('message', 'Password updated successfully.');
    }

   
}
