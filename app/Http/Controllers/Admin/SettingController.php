<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index() {
        $settings = AdminSetting::first();

        if(!$settings) {
            $settings = new AdminSetting();

            $settings->phone = '0555 555 5555';
            $settings->email = 'info@psikolog.com';

            $settings->save();
        }

        return view('admin.setting.index', compact('settings'));
    }

    public function update(Request $request) {


        $settings = AdminSetting::first();

        $settings->phone = $request->phone;
        $settings->email = $request->email;

        // Resim yükleme işlemi
        if ($request->hasFile('logo')) {
            // Yeni resim dosyasını yükleme
            $image = $request->file('logo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('logo', $imageName, 'public');

            // Eski resim dosyasını silme (isteğe bağlı)
            if ($settings->logo) {
                Storage::disk('public')->delete($settings->logo);
            }

            // Yeni resim yolunu veritabanına kaydetme
            $settings->logo = 'storage/' . $imagePath;
        }

        $settings->save();

        return view('admin.setting.index', compact('settings'));
    }
}
