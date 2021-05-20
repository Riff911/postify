<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

class AnalyticsController extends Controller
{
    public function index(){
        $users = User::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
        $months = User::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $userlist = array();
        $postlist = array();
        foreach ($months as $index => $month){
            $datas[$month] = $users[$index];
        }
        foreach (User::withCount('posts')->get() as $user){
            if($user->posts_count > 0){
                array_push($userlist,$user->name);
                array_push($postlist,$user->posts_count);
            }
        }
        return view('dashboard',compact('datas','userlist','postlist'));
    }
}
