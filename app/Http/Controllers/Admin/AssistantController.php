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

class AssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $offices = Office::with(['officeBranches'])->get();

        $assistants = User::where('is_assistant', 1)->with(['officeBranches.office'])->get();

        return view('admin.assistant.index', compact('offices', 'assistants'));
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

            $user->is_assistant = 1;
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


    
            return to_route('dashboard.assistant.index')->with(['status' => 'success', 'message' => 'Asistan başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            dd($e);
            return to_route('dashboard.assistant.index')->with(['status' => 'error', 'message' => 'Asistan oluşturma başarısız.']);
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
            $assistant = User::where('id', $request->id)->with(['officeBranches.office'])->first();

            $assistant->is_assistant = 1;
            $assistant->name = $request->name;
            if($request->email != $assistant->email) {
                $assistant->email = $request->email;

            }

            if($request->phone != $assistant->phone) {
                $assistant->phone = $request->phone;
            }

            if($request->password) {
                $assistant->password = Hash::make($request->password);
            }

            $assistant->office_id = $request->office_id;

            if($assistant->officeBranches) {
                foreach ($assistant->officeBranches as $key => $value) {
                    $assistant->officeBranches()->detach($value->id);
                }
            }

            

            if($request->office_branch_id) {
                foreach ($request->office_branch_id as $key => $value) {
                    
                    $assistant->officeBranches()->attach($value);

                }
            }


            $assistant->save();


    
            return to_route('dashboard.assistant.index')->with(['status' => 'success', 'message' => 'Asistan başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            dd($e);
            return to_route('dashboard.assistant.index')->with(['status' => 'error', 'message' => 'Asistan güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $assistant = User::find($request->id);

            $assistant->delete();
    
            return to_route('dashboard.assistant.index')->with(['status' => 'success', 'message' => 'Asistan başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('dashboard.assistant.index')->with(['status' => 'error', 'message' => 'Asistan silinemedi.']);
        }
    }
}
