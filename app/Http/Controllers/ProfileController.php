<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        
    $profileOfUser          = DB::table('users')
                                  ->join('plans', 'users.id_plan', '=', 'plans.id_plan')
                                    ->find(auth()->user()->id);
                                        //dd($profileOfUser->imgprofile_data);
     // dd($profileOfUser );
      
        return view('profile.myinfo', ['profileOfUser' => $profileOfUser]);
        
    }


    public function sendimgtoserver (Request $request)
    {
        //dd($request->imgprofile_data);
         
               $updateprofileimg       =  DB::table('users')
                                            ->where('id', Auth::id() )
                                            ->update(['imgprofile_data' => $request->imgprofile_data]);
        

                $imageUploaded          = User::select('imgprofile_data', 'id')
                                                        ->where('id', Auth::id())
                                                        ->get();
                
                $profileOfUser          = User::join('plans', 'users.id_plan', '=', 'plans.id_plan')
                                                ->find(Auth::id());

                if($imageUploaded){

                    return view('profile.myinfo', ['imageUploaded' => $imageUploaded], ['profileOfUser' => $profileOfUser])->withMessage('Success','Your updates have been saved');


                } else {

                    return redirect()->back()->with('fail','Something went wrong');
                }
        
     }
    

}


?>