<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pricing;
use App\Models\Subscription;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Find the Pricing by ID
        $user = User::findOrFail($id);
    
        // Update the pricing
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => $request->email_verified_at,
            'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            'package_manager_id' => $request->package_manager_id,
            'stripe_id' => $request->stripe_id
        ]);
        
        // Redirect back with success message
        return redirect()->route('users')->with('success', 'User updated successfully!');
    }
    
    

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully!');
    }
}
