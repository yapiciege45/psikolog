<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminQuestion;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $questions = AdminQuestion::orderBy('order')->get();

        return view('admin.question.index', compact('questions'));
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
            $question = new AdminQuestion();

            $question->question = $request->question;
            $question->answer = $request->answer;
            $question->order = $request->order;

            $question->save();


    
            return to_route('dashboard.question.index')->with(['status' => 'success', 'message' => 'Soru başarıyla oluşturuldu.']);
    
        } catch (Exception $e) {
            
            return to_route('dashboard.question.index')->with(['status' => 'error', 'message' => 'Soru oluşturma başarısız.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminQuestion $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminQuestion $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminQuestion $office)
    {
        try {
            $question = AdminQuestion::find($request->id)->first();

            $question->question = $request->question;
            $question->answer = $request->answer;
            $question->order = $request->order;


            $question->save();


    
            return to_route('dashboard.question.index')->with(['status' => 'success', 'message' => 'Soru başarıyla güncellendi.']);
    
        } catch (Exception $e) {
            
            return to_route('dashboard.question.index')->with(['status' => 'error', 'message' => 'Soru güncelleme başarısız.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $question = AdminQuestion::find($request->id);

            $question->delete();
    
            return to_route('dashboard.question.index')->with(['status' => 'success', 'message' => 'Soru başarıyla silindi.']);
    
        } catch (Exception $e) {
            return to_route('dashboard.question.index')->with(['status' => 'error', 'message' => 'Soru silinemedi.']);
        }
    }
}
