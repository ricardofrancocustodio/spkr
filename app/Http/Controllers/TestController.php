<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Test;
use App\Questionhasanswer;
use App\Models\Question;
use App\Models\Answer;
use App\Models\UserHasRespondedQuestions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Http\Controllers\SavequestionsController;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testindex(Request $request)
    {
        //dd($request);  
        $userID    = auth()->user()->id; 

        $query  = Question::select('question_text', 'id_practice_test', 'id_question', 'id_exam_type', 'id_time_question', 'audio_question', 'img_question', 'id_tenant', 'id_company')
                        ->where('id_practice_test', $request->id_practice_test)
                        ->whereNotIn('id_question', function($query){
                            $query->select('id_question')
                                    ->from('answer');
                        },)
                    ->get();
        
        $question = $query->first();
        
       // dd($request);                                   
        if ($question == null){return redirect()->to('/successpage'); }
            
        
        return view('test/testindex', ['question' => $question, 'userID' => $userID]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function deleteanswer (Request $request)
    {
        $userID = auth()->user()->id; 

        Answer::where('id_user', $userID)
                ->where('id_answer', $request->id_answer)
                >delete();

            //return view('/test/selectyourtest');
            return redirect()->to('recordings/list');
    }


    public function deleteselectedanswer (Request $request)
    {
       // dd($request);
        
        $userID                 = auth()->user()->id; 
        
        foreach($request->id_answer as $key => $value)
        {
            DB::table('answer')
            ->where('id_user', $userID)
            ->where('id_answer', $value)
            ->delete();

        }

            //return view('/test/selectyourtest');
            return redirect()->to('recordings/list');
    }


    
    public function deleteallanswers (Request $request)
    {

        $userID                 = auth()->user()->id; 

        DB::table('answer')
            ->where('id_user', $userID)
            ->where('id_practice_test', $request->id_practice_test)
            ->delete();

            //return view('/test/selectyourtest');
            return redirect()->to('dashboard');
    }



      
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
       
    }
}
