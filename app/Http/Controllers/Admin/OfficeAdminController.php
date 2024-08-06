<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\OfficeBranch;
use App\Models\Psychologist;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OfficeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $offices = Office::with(['officeBranches'])->get();

        $office_admins = User::where('is_office_admin', 1)->with(['officeBranches.office'])->get();

        return view('admin.office_admin.index', compact('offices', 'office_admins'));
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
            $user = new User();

            $user->is_office_admin = 1;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->office_id = $request->office_id;

            $user->save();

            if($request->office_branch_id) {
                foreach ($request->office_branch_id as $key => $value) {
                    
                    $user->officeBranches()->attach($value);

                }
            }


    
            return to_route('dashboard.office_admin.index')->with(['status' => 'success', 'message' => 'Ofis Admini başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            
            return to_route('dashboard.office_admin.index')->with(['status' => 'error', 'message' => 'Ofis Admini oluşturma başarısız.']);
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
            $office_admin = User::where('id', $request->id)->with(['officeBranches.office'])->first();

            $office_admin->is_office_admin = 1;
            $office_admin->name = $request->name;
            $office_admin->email = $request->email;
            $office_admin->phone = $request->phone;

            if($request->password) {
                $office_admin->password = Hash::make($request->password);
            }

            $office_admin->office_id = $request->office_id;


            $office_admin->save();


    
            return to_route('dashboard.psychologist.index')->with(['status' => 'success', 'message' => 'Ofis Admin başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            
            return to_route('dashboard.psychologist.index')->with(['status' => 'error', 'message' => 'Ofis Admin güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $office_admin = User::find($request->id);

            $office_admin->delete();
    
            return to_route('dashboard.office_admin.index')->with(['status' => 'success', 'message' => 'Ofis Admin başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('dashboard.office_admin.index')->with(['status' => 'error', 'message' => 'Ofis Admin silinemedi.']);
        }
    }
}
