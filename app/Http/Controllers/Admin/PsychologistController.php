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

class PsychologistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $offices = Office::with(['officeBranches'])->get();

        $psychologists = User::where('is_psychologist', 1)->with(['officeBranches.office'])->get();

        return view('admin.psychologist.index', compact('offices', 'psychologists'));
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

            $user->is_psychologist = 1;
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


    
            return to_route('dashboard.psychologist.index')->with(['status' => 'success', 'message' => 'Psikolog başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            
            return to_route('dashboard.psychologist.index')->with(['status' => 'error', 'message' => 'Psikolog oluşturma başarısız.']);
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
            $psychologist = User::where('id', $request->id)->with(['officeBranches.office'])->first();

            $psychologist->is_psychologist = 1;
            $psychologist->name = $request->name;
            
            if($request->email != $psychologist->email) {
                $psychologist->email = $request->email;

            }
            if($request->phone != $psychologist->phone) {
                $psychologist->phone = $request->phone;

            }
            

            if($request->password) {
                $psychologist->password = Hash::make($request->password);
            }

            $psychologist->office_id = $request->office_id;

            if($psychologist->officeBranches) {
                foreach ($psychologist->officeBranches as $key => $value) {
                    $psychologist->officeBranches()->detach($value->id);
                }
            }

            

            if($request->office_branch_id) {
                foreach ($request->office_branch_id as $key => $value) {
                    
                    $psychologist->officeBranches()->attach($value);

                }
            }


            $psychologist->save();


    
            return to_route('dashboard.psychologist.index')->with(['status' => 'success', 'message' => 'Psikolog başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            
            return to_route('dashboard.psychologist.index')->with(['status' => 'error', 'message' => 'Psikolog güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $psychologist = User::find($request->id);

            $psychologist->delete();
    
            return to_route('dashboard.psychologist.index')->with(['status' => 'success', 'message' => 'Psikolog başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('dashboard.psychologist.index')->with(['status' => 'error', 'message' => 'Psikolog silinemedi.']);
        }
    }
}
