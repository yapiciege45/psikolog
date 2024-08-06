<?php

namespace App\Http\Controllers\OfficeAdmin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Day;
use App\Models\Office;
use App\Models\OfficeBranch;
use App\Models\Psychologist;
use App\Models\Room;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $office = Office::find($request->user()->office_id);

        $applications = Application::all();

        return view('office.admin.application.index', compact('office', 'applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $application = new Application();

            $application->name = $request->name;
            $application->description = $request->description;
            $application->is_active = 1;

            $application->save();
    
            return to_route('office.dashboard.application.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Oda başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            
            return to_route('office.dashboard.application.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Oda oluşturma başarısız.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Office $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Office $office)
    {
        try {
            $application = Application::where('id', $request->id)->first();

            $application->name = $request->name;
            $application->description = $request->description;
            $application->is_active = 1;

            $application->save();


    
            return to_route('office.dashboard.application.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Oda başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            
            return to_route('office.dashboard.application.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Oda güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $application = Application::find($request->id);

            $application->delete();
    
            return to_route('office.dashboard.application.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Oda başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('office.dashboard.application.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Oda silinemedi.']);
        }
    }
}
