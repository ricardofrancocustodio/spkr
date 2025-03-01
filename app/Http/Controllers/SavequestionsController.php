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
use App\Http\Controllers\TestController;
use Illuminate\Support\Str;

class SavequestionsController extends Controller
{

    public function savequestions(Request $request)
    {
        //dd($request->recordedAudio);

        $userResponseAnswer                   = new Answer();
        $userResponseAnswer->id_user          = Auth::id();
        $userResponseAnswer->id_question      = $request->id_question;
        $userResponseAnswer->id_exam_type     = $request->id_exam_type;
        $userResponseAnswer->id_practice_test = $request->id_practice_test;
        $userResponseAnswer->recorded_audio   = $request->recordedAudio;
        $userResponseAnswer->save();
     
        $id_practice_test           = $request->id_practice_test;    
    //retorna direto na blade sem passar pelo controller
    //return view('test.index', ['id_practice_test' => $id_practice_test ]);
     
   
   //GET METHODS
    return redirect()->action([TestController::class, 'testindex'], ['id_practice_test' => $request->id_practice_test]);
   //return redirect()->route('index');
  // return redirect()->to('/test/selectyourtest');
        
        
    //return redirect()->route('index');


    }
}