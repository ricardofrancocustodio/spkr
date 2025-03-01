<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Test;
use App\Models\Question;
use App\Models\Evaluation;
use App\Models\Countrycode;
use App\Models\Answer;
use App\Models\Testtype;
use App\Models\Testanswers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listEvaluationTest     = Evaluation::get();

        //dd($listEvaluationTest);
        return view('evaluationtest.index', ['listEvaluationTest' => $listEvaluationTest]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $testtypes          = Testtype::get()
                                     ->toArray();

        $countrycode        = Countrycode::get();

        return view('evaluationtest.create', ['testtypes' => $testtypes], ['countrycode' => $countrycode]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function evaluationstore(Request $request)
    {
        //dd($request);

        $evaluationDB                       = new Evaluation();
        
        $evaluationDB->url_link             = $request->url_link;
        $evaluationDB->candidate_name       = $request->candidate_name;
        $evaluationDB->candidate_email      = $request->candidate_email;
        $evaluationDB->country_code         = $request->country_code;
        $evaluationDB->phone_number         = $request->phone_number;
        $evaluationDB->notes                = $request->notes;
        $evaluationDB->id_et_creation_user  = Auth::id();
        $evaluationDB->save();

        for($i=0; $i < sizeof($request->id_question); $i++){

            $testanswerDB                       = new Testanswers();
            $testanswerDB->id_question          = $request->id_question[$i];
            $testanswerDB->id_evaluation        = $evaluationDB->id_evaluation;
            $testanswerDB->save();

        }
        
        return redirect()->action([EvaluationController::class, 'create']);
       //return view('evaluationtest.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function evaluationshow($id)
    {
        //
        $listEvaluationTest     = Evaluation::join('countrycode', 'countrycode.data_countrycode', '=', 'evaluations.country_code')
                                            ->get()
                                            ->find($id);

        $testanswers            = Testanswers::join('question', 'question.id_question', '=', 'testanswers.id_question')
                                                ->where('id_evaluation', $id)
                                                ->get();

          //dd($testanswers[0]['question_text']);                                      

        return view('evaluationtest.view', ['listEvaluationTest' => $listEvaluationTest], ['testanswers' => $testanswers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function evaluationedit($id)
    {
        //
        $listEvaluationTest     = Evaluation::join('countrycode', 'countrycode.data_countrycode', '=', 'evaluations.country_code')
                                            ->get()
                                            ->find($id);

        //dd($listEvaluationTest);
        $testanswers            = Testanswers::join('question', 'question.id_question', '=', 'testanswers.id_question')
                                                ->where('id_evaluation', $id)
                                                ->get();

        $countrycode        = Countrycode::get();

       // dd($countrycode);

        //return view('evaluationtest.edit', ['countrycode' => $countrycode], ['listEvaluationTest' => $listEvaluationTest], ['testanswers' => $testanswers]);
        return view('evaluationtest.edit', ['countrycode' => $countrycode, 'listEvaluationTest' => $listEvaluationTest, 'testanswers' => $testanswers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function evaluationupdate(Request $request, $id)
    {
        //
    }


    public function getquestionlist(Request $request)
    {
        //
        $evaluationQuestions           = Question::where('id_test_type', $request->id_test_type)
                                                    ->get()
                                                    ->toArray();


        return response()->json(['evaluationQuestions' => $evaluationQuestions]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function evaluationdestroy($id)
    {
        //
    }



}
