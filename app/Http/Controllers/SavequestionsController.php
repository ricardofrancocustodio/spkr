<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\TestController;
use Illuminate\Support\Str;


class SavequestionsController extends Controller
{

    public function savequestions(Request $request)
    {
        //dd(request()->all());
        if (!$request->hasFile('recordedAudio')) {
            return response()->json(['error' => 'Nenhum arquivo enviado'], 400);
        }

        $id_user = $request->input('id_user');
        $id_question = $request->input('id_question');
        $id_exam_type = $request->input('id_exam_type');
        $id_practice_test = $request->input('id_practice_test');
        $id_tenant = $request->input('id_tenant');
        $id_company = $request->input('id_company');
        $recordedAudio = $request->file('recordedAudio');


        // Define um nome único e cria uma pasta por usuário
        $filePath = $id_user. time() . '-' . uniqid() . '.opus';

        // Salvar no DigitalOcean Spaces
        Storage::disk('spaces')->put($filePath, file_get_contents($recordedAudio), 'public');
        
        // Obtém a URL pública correta usando a configuração do Laravel
        //$fileUrl = config('filesystems.disks.spaces.endpoint') . '/' . $filePath;
        $fileUrl = Storage::disk('spaces')->url($filePath);
        
        $userResponseAnswer                   = new Answer();
        $userResponseAnswer->id_user          = $id_user;
        $userResponseAnswer->id_question      = $id_question;
        $userResponseAnswer->id_exam_type     = $id_exam_type;
        $userResponseAnswer->id_practice_test = $id_practice_test;
        $userResponseAnswer->id_tenant        = $id_tenant;
        $userResponseAnswer->id_company       = $id_company;
        $userResponseAnswer->recorded_audio   = $fileUrl;  // Agora salva só a URL
        $userResponseAnswer->save();
   //GET METHODS
       // return redirect()->action([TestController::class, 'testindex']);
  
       return response()->json([
        'success' => true,
        'audio_url' => $fileUrl,
        'next_question_url' => route('testindex', ['id_practice_test' => $id_practice_test])
    ]);
    

    //return redirect()->route('index');
  // return redirect()->to('/test/selectyourtest');
        
        
    //return redirect()->route('index');


    }
}