<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\AdminQuestion;
use App\Models\AdminSetting;
use App\Models\Contact;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {

        $packages = Package::with('packageFeatures')->orderBy('order')->get();

        $questions = AdminQuestion::orderBy('order')->get();

        $settings = AdminSetting::first();

        return view('welcome', compact('packages', 'questions', 'settings'));
    }

    public function contact(Request $request) {

    try {
            $contact = new Contact();

            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;

            $contact->save();

            return to_route('index')->with(['status' => 'success', 'message' => 'Başarıyla gönderildi. Sizinle e-posta üzerinden iletişime geçmemizi bekleyebilirsiniz.']);
    } catch (\Throwable $th) {
        return to_route('index')->with(['status' => 'error', 'message' => 'Gönderme sırasında bir hata oluştu!']);
    }

        

        
    }
}
