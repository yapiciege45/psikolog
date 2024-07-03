<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offices = Office::all();

        return view('admin.office.index', compact('offices'));
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
            $office = new Office();

            $office->name = $request->name;
            $office->slug = $request->slug;
            $office->location = $request->location;
            $office->email = $request->email;

            // Resim yükleme işlemi
            if ($request->hasFile('image')) {
                // Yeni resim dosyasını yükleme
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('images/offices', $imageName, 'public');

                // Eski resim dosyasını silme (isteğe bağlı)
                if ($office->image) {
                    Storage::disk('public')->delete($office->image);
                }

                // Yeni resim yolunu veritabanına kaydetme
                $office->image = 'storage/' . $imagePath;
            }

            // Office modelini kaydet
            $office->save();


    
            return to_route('dashboard.office.index')->with(['status' => 'success', 'message' => 'Ofis başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            dd($e);
            return to_route('dashboard.office.index')->with(['status' => 'error', 'message' => 'Ofis oluşturma başarısız.']);
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
            $office = Office::find($request->id);

            $office->name = $request->name;
            $office->slug = $request->slug;
            $office->location = $request->location;
            $office->email = $request->email;

            // Resim yükleme işlemi
            if ($request->hasFile('image')) {
                // Yeni resim dosyasını yükleme
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('images/offices', $imageName, 'public');

                // Eski resim dosyasını silme (isteğe bağlı)
                if ($office->image) {
                    Storage::disk('public')->delete($office->image);
                }

                // Yeni resim yolunu veritabanına kaydetme
                $office->image = 'storage/' . $imagePath;
            }

            // Office modelini kaydet
            $office->save();


    
            return to_route('dashboard.office.index')->with(['status' => 'success', 'message' => 'Ofis başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            dd($e);
            return to_route('dashboard.office.index')->with(['status' => 'error', 'message' => 'Ofis güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $office = Office::find($request->id);

            $office->delete();
    
            return to_route('dashboard.office.index')->with(['status' => 'success', 'message' => 'Ofis başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('dashboard.office.index')->with(['status' => 'error', 'message' => 'Ofis silinemedi.']);
        }
    }
}
