<?php

namespace App\Http\Controllers\Creater\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Creater;

class ProfileController extends Controller
{
    public function showProfile($id)
    {
        // Find the user by ID
        $user = Creater::findOrFail($id);

        // You might pass the user data to a view
        return view('creater.profile.profile', ['user' => $user]);
    }
    public function updateProfile(Request $request, $id)
    {
       // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        // Find the user by ID
        $user = Creater::findOrFail($id);

        // Update the user's profile with the request data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),  
        ]);

        // Redirect or return a response as needed
        return redirect()->route('creatershowProfile', $id)->with('success', 'Profile updated successfully');
    }
}
