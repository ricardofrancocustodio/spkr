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

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {

        $planOfTheUser      = User::join('plans', 'users.id_plan', '=', 'plans.id_plan')
                            ->find(Auth::id());

        $existingPlans      = Plan::get()->toArray();         
       // dd( $existingPlans)           ;

        return view('plan.plans', ['existingPlans' => $existingPlans], ['planOfTheUser' => $planOfTheUser]);
    }


}


?>