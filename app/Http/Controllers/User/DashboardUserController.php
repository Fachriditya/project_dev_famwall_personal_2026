<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    public function index()
    {
        // Get total saldo keluarga (sama kayak admin)
        $totalSaldo = DB::table('v_total_saldo')->first();

        // Get data user ini dari view kontribusi
        $userStats = DB::table('v_kontribusi_user')
                        ->where('id', Auth::id())
                        ->first();

        // Get leaderboard top 10
        $leaderboard = DB::table('v_leaderboard')
                        ->get();

        return view('user.dashboard', compact('totalSaldo', 'userStats', 'leaderboard'));
    }
}