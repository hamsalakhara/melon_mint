<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Admin;

class ProfileController extends Controller
{
    public function showProfile($id)
    {
        // Find the user by ID
        $user = Admin::findOrFail($id);
        // You might pass the user data to a view
        return view('admin.profile.profile', ['user' => $user]);
    }
    public function updateProfile(Request $request, $id)
    {
       // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        // Find the user by ID
        $user = Admin::findOrFail($id);
       
        // Update the user's profile with the request data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),  
        ]);

        // Redirect or return a response as needed
        return redirect()->route('showProfile', $id)->with('success', 'Profile updated successfully');
    }
}
