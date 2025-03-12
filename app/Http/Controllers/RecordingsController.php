<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class RecordingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recordingsindex(Request $request)
    {
        $userID = auth()->user()->id;

    
            // Verifica se existem registros antes de aplicar os joins
            $recordinglist = Answer::with(['question', 'practiceTest', 'company', 'tenant'])
                 ->where('id_user', 1)
                 ->where('id_practice_test', 1)
                 ->get();

                 //dd($answers);

            if ($recordinglist->isEmpty()) {
                return view('recordings.list', [
                    'recordinglist' => [],
                    'error' => 'Nenhum resultado encontrado para esse usuário e teste prático.'
                ]);
            }


            //Answer::select(
                $answers =  Answer::with([
                'answer.id_user',
                'practice_test.practice_test_name',
                'answer.id_answer',
                'answer.id_question',
                'answer.id_practice_test',
                'answer.recorded_audio',
                'question.question_text']
            )
            ->join('question', 'question.id_question', '=', 'answer.id_question')
            ->join('practice_test', 'practice_test.id_practice_test', '=', 'answer.id_practice_test')
            ->where('answer.id_practice_test', $request->id_practice_test)
            ->where('answer.id_user', $userID)
            ->get();

           // dd($recordinglist);

            return view('recordings.list', ['recordinglist' => $recordinglist]);

        
    }

    /**
     * Método alternativo com query SQL bruta
     */
    public function recordingsindexRaw(Request $request)
    {
        $request->validate([
            'id_practice_test' => 'required'
        ]);

        $userID = auth()->user()->id;
        
        try {
            // Consulta SQL bruta
            $recordinglist = DB::select("SELECT a.id_user, pt.practice_test_name, a.id_answer, a.id_question, 
                                                a.id_practice_test, a.recorded_audio, q.question_text, 
                                                c.company_name, t.tenant_name
                                         FROM answer a
                                         JOIN question q ON q.id_question = a.id_question
                                         JOIN practice_test pt ON pt.id_practice_test = a.id_practice_test
                                         LEFT JOIN company c ON c.id_company = a.id_company
                                         LEFT JOIN tenant t ON t.id_tenant = a.id_tenant
                                         WHERE a.id_practice_test = ? AND a.id_user = ?", 
                                        [$request->id_practice_test, $userID]);

            return view('recordings.list', ['recordinglist' => $recordinglist]);

        } catch (\Exception $e) {
            return view('recordings.list', [
                'recordinglist' => [],
                'error' => 'Erro ao recuperar as gravações: ' . $e->getMessage()
            ]);
        }
    }
}
?>
