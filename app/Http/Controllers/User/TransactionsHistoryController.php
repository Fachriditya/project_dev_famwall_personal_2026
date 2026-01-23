<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionsHistoryController extends Controller
{
    /**
     * Display user's transaction history
     */
    public function index()
    {
        $userId = Auth::id();

        $transactions = DB::table('transactions')
                        ->where('user_id', $userId)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);

        $summary = DB::table('v_kontribusi_user')
                    ->where('id', $userId)
                    ->first();

        if (!$summary) {
            $summary = (object) [
                'total_masuk' => 0,
                'total_keluar' => 0,
                'saldo' => 0,
                'jumlah_nabung' => 0,
                'jumlah_tarik' => 0,
                'total_transaksi' => 0,
            ];
        }

        return view('user.transactions.index', compact('transactions', 'summary'));
    }
}