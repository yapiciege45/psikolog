<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();

        return view('admin.contact.index', compact('contacts'));
    }

    public function destroy(Request $request)
    {
        try {
            $contact = Contact::find($request->id);

            $contact->delete();
    
            return to_route('dashboard.contact.index')->with(['status' => 'success', 'message' => 'Mesaj başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('dashboard.contact.index')->with(['status' => 'error', 'message' => 'Mesaj silinemedi.']);
        }
    }
}
