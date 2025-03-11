<?php

namespace App\Http\Controllers;

use App\Models\PackageManager;
use Illuminate\Http\Request;
use App\Models\Pricing;

class PackageManagerController extends Controller
{
    public function index()
    {
        $packages = PackageManager::all();
        return view('packages.index', compact('packages'));
    }

    public function edit($id)
    {
        $packages = PackageManager::findOrFail($id);
        return view('packages.edit', compact('packages'));
    }
    public function update(Request $request, $id)
    {
        // Find the Pricing by ID
        $packages = PackageManager::findOrFail($id);
    
    
        // Update the pricing
        $packages->update([
            'user_id' => $request->user_id,
            'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            'package_slug' => $request->package_slug,
            'url_count' => $request->url_count,
            'urls' => $request->urls,
            'priority' => $request->priority,
            'end_at' => $request->end_at,
        ]);
        
    
        // Redirect back with success message
        return redirect()->route('packages')->with('success', 'Packages updated successfully!');
    }
    
    

    public function destroy($id)
    {
        $packages = PackageManager::findOrFail($id);
        $packages->delete();

        return redirect()->route('packages')->with('success', 'Packages deleted successfully!');
    }
}
