<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pricing;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function edit($id)
    {
        $subscriptions = Subscription::findOrFail($id);
        return view('subscriptions.edit', compact('subscriptions'));
    }
    public function update(Request $request, $id)
    {
        // Find the Pricing by ID
        $subscriptions = Subscription::findOrFail($id);
    
        // Update the pricing
        $subscriptions->update([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'stripe_id' => $request->stripe_id,
            'stripe_session_id' => $request->stripe_session_id,
            'stripe_status' => $request->stripe_status,
            'stripe_price' => $request->stripe_price,
            'currency' => $request->currency,
            'quantity' => $request->quantity,
            'invoice_id' => $request->invoice_id,
            'order_id' => $request->order_id,
            'package_slug' => $request->package_slug,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'subscription' => $request->subscription,
            'ends_at' => $request->ends_at
        ]);
        
    
        // Redirect back with success message
        return redirect()->route('subscriptions')->with('success', 'Subscriptions updated successfully!');
    }
    
    

    public function destroy($id)
    {
        $subscriptions = Subscription::findOrFail($id);
        $subscriptions->delete();

        return redirect()->route('subscriptions')->with('success', 'Subscriptions deleted successfully!');
    }
}
