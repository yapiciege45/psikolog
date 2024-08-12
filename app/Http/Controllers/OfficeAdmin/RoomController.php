<?php

namespace App\Http\Controllers\OfficeAdmin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Office;
use App\Models\OfficeBranch;
use App\Models\Psychologist;
use App\Models\Room;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $office = Office::find($request->user()->office_id);

        $rooms = Room::all();

        return view('office.admin.room.index', compact('office', 'rooms'));
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
            $room = new Room();

            $room->name = $request->name;
            $room->color = $request->color;
            $room->description = $request->description;
            $room->is_active = 1;

            $room->save();
    
            return to_route('office.dashboard.room.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Oda başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            
            return to_route('office.dashboard.room.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Oda oluşturma başarısız.']);
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
            $room = Room::where('id', $request->id)->first();

            $room->name = $request->name;
            $room->color = $request->color;
            $room->description = $request->description;
            $room->is_active = 1;

            $room->save();


    
            return to_route('office.dashboard.room.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Oda başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            
            return to_route('office.dashboard.room.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Oda güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $room = Room::find($request->id);

            $room->delete();
    
            return to_route('office.dashboard.room.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Oda başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('office.dashboard.room.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Oda silinemedi.']);
        }
    }
}
