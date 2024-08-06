<?php

namespace App\Http\Controllers\OfficeAdmin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Day;
use App\Models\Office;
use App\Models\OfficeBranch;
use App\Models\Psychologist;
use App\Models\Room;
use App\Models\Type;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $office = Office::find($request->user()->office_id);

        $types = Type::all();

        return view('office.admin.type.index', compact('office', 'types'));
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
            $type = new Type();

            $type->name = $request->name;

            $type->save();
    
            return to_route('office.dashboard.type.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Randevu türü başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            
            return to_route('office.dashboard.type.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Randevu türü oluşturma başarısız.']);
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
            $type = Type::where('id', $request->id)->first();

            $type->name = $request->name;

            $type->save();


    
            return to_route('office.dashboard.type.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Seans türü başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            
            return to_route('office.dashboard.type.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Seans türü güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $type = Type::find($request->id);

            $type->delete();
    
            return to_route('office.dashboard.type.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Seans türü başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('office.dashboard.type.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Seans türü silinemedi.']);
        }
    }
}
