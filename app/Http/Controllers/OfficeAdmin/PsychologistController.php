<?php

namespace App\Http\Controllers\OfficeAdmin;

use App\Http\Controllers\Controller;
use App\Models\Day;
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
    public function index(Request $request)
    {

        $office = Office::find($request->user()->office_id);

        $office_branches = OfficeBranch::where('office_id', $office->id)->get();

        $office_branch_ids = $office_branches->pluck('id');

        $psychologists = User::where('is_psychologist', 1)->where('office_id', $office->id)->with(['officeBranches.office', 'days'])->get();

        $days = Day::all();

        return view('office.admin.psychologist.index', compact('days', 'office_branches', 'psychologists', 'office_branch_ids', 'office'));
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
            $user->office_id = $request->user()->office->id;

            $user->save();

            if($request->office_branch_id) {
                foreach ($request->office_branch_id as $key => $value) {
                    
                    $user->officeBranches()->attach($value);

                }
            }

            if($request->days) {
                foreach ($request->days as $key => $value) {
                    
                    $user->days()->attach($value);

                }
            }


    
            return to_route('office.dashboard.psychologist.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Psikolog başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            
            return to_route('office.dashboard.psychologist.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Psikolog oluşturma başarısız.']);
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
            $psychologist->is_assistant = 0;
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

            if($psychologist->days) {
                foreach ($psychologist->days as $key => $value) {
                    $psychologist->days()->detach($value->id);
                }
            }

            if($request->days) {
                foreach ($request->days as $key => $value) {
                    
                    $psychologist->days()->attach($value);

                }
            }


            $psychologist->save();


    
            return to_route('office.dashboard.psychologist.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Psikolog başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            
            return to_route('office.dashboard.psychologist.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Psikolog güncelleme başarısız.']);
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
    
            return to_route('office.dashboard.psychologist.index', ['slug' => $request->user()->office->slug])->with(['status' => 'success', 'message' => 'Psikolog başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('office.dashboard.psychologist.index', ['slug' => $request->user()->office->slug])->with(['status' => 'error', 'message' => 'Psikolog silinemedi.']);
        }
    }
}
