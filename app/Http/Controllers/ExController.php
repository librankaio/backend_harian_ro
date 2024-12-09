<?php

namespace App\Http\Controllers;

use App\Models\TkunjunganRo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExController extends Controller
{
    public function getUser(){
        $data = User::all();
        return response()->json($data, 200);
    }

    public function getById($id){
        $data = User::findOrFail($id);
        // return response()->json($data, 200);
        return response()->json([
            'message'=>'success',
            'data' => $data,
            'code' => 200,
        ]);
    }

     // Method to handle profile update including image upload
     public function update(Request $request, $id)
     {
         // Validate the request
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
 
         // Find the profile by ID
         $profile = User::findOrFail($id);
 
         // Update the name
         $profile->name = $validated['name'];
 
         // Handle image upload
         if ($request->hasFile('image')) {
             // Delete the old image if exists
             if ($profile->image && Storage::disk('public')->exists($profile->image)) {
                 Storage::disk('public')->delete($profile->image);
             }
 
             // Store the new image in 'public' disk
             $imagePath = $request->file('image')->store('profiles', 'public');
 
             // Save the image path in the database
             $profile->image = $imagePath;
         }
 
         // Save the profile changes
         $profile->save();
 
         return response()->json(['message' => 'Profile updated successfully', 'profile' => $profile]);
     }
}
