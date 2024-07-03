<?php

namespace App\Http\Controllers\OfficeAdmin;

use App\Http\Controllers\Controller;
use App\Models\OfficeSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $office = auth()->user()->office;
        $settings = OfficeSetting::where('office_id', auth()->user()->office->id)->first();

        if(!$settings) {
            $settings = new OfficeSetting();

            $settings->office_id = auth()->user()->office->id;
            $settings->opening_hour = '08:00';
            $settings->closing_hour = '22:00';
            $settings->tax = 30;

            $settings->save();
        }

        return view('office.admin.setting.index', compact('settings', 'office'));
    }

    public function update(Request $request) {
        $office = auth()->user()->office;

        $settings = OfficeSetting::where('office_id', auth()->user()->office->id)->first();

        $settings->opening_hour = $request->opening_hour;
        $settings->closing_hour = $request->closing_hour;
        $settings->tax = $request->tax;

        $settings->save();

        return to_route('office.dashboard.setting.index', ['slug' => $office->slug])->with(['status' => 'success', 'message' => 'Ayarlar kaydedildi.']);
    }
}
