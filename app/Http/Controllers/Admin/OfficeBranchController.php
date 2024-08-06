<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\OfficeBranch;
use Exception;
use Illuminate\Http\Request;

class OfficeBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $office_branches = OfficeBranch::with(['office'])->get();

        $offices = Office::all();

        return view('admin.branch.index', compact('offices', 'office_branches'));
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
            $office_branch = new OfficeBranch();

            $office_branch->name = $request->name;
            $office_branch->office_id = $request->office_id;

            // Office modelini kaydet
            $office_branch->save();


    
            return to_route('dashboard.branch.index')->with(['status' => 'success', 'message' => 'Şube başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            
            return to_route('dashboard.branch.index')->with(['status' => 'error', 'message' => 'Şube oluşturma başarısız.']);
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
            $office_branch = OfficeBranch::find($request->id);

            $office_branch->name = $request->name;
            $office_branch->office_id = $request->office_id;

            // Office modelini kaydet
            $office_branch->save();


    
            return to_route('dashboard.branch.index')->with(['status' => 'success', 'message' => 'Şube başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            return to_route('dashboard.branch.index')->with(['status' => 'error', 'message' => 'Şube güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $office_branch = OfficeBranch::find($request->id);

            $office_branch->delete();
    
            return to_route('dashboard.branch.index')->with(['status' => 'success', 'message' => 'Şube başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('dashboard.branch.index')->with(['status' => 'error', 'message' => 'Şube silinemedi.']);
        }
    }
}
