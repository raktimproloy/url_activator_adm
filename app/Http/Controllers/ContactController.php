<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subscription;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $subscriptions = Subscription::findOrFail($id);
        $subscriptions->delete();

        return redirect()->route('subscriptions')->with('success', 'Subscriptions deleted successfully!');
    }
}
