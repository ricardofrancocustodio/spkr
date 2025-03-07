<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Answer;
use App\Test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class RecordingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recordingsindex (Request $request){

        $userID = auth()->user()->id; 

        $recordinglist = Answer::select('answer.id_user','practice_test.practice_test_name','answer.id_answer', 'answer.id_question', 'answer.id_practice_test', 'answer.recorded_audio', 'question.question_text')
                                                ->join('question', 'question.id_question', '=', 'answer.id_question')
                                                ->join('practice_test', 'practice_test.id_practice_test', '=', 'answer.id_practice_test')
                                                ->where('answer.id_practice_test', $request->id_practice_test)
                                                ->where('answer.id_user', $userID)
                                                ->get()->toArray();

        return view('recordings/list', ['recordinglist' => $recordinglist] ?? null);

    }
}


?>