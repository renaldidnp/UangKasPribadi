<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Bulan dan tahun sekarang
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Total Pemasukan
        $totalPemasukan = Transaction::where('user_id', $user->id)
            ->where('type', 'pemasukan')
            ->sum('amount');

        // Total Pengeluaran
        $totalPengeluaran = Transaction::where('user_id', $user->id)
            ->where('type', 'pengeluaran')
            ->sum('amount');

        // Total Saldo
        $totalSaldo = $totalPemasukan - $totalPengeluaran;

        // Pemasukan Bulan Ini
        $pemasukanBulanIni = Transaction::where('user_id', $user->id)
            ->where('type', 'pemasukan')
            ->whereMonth('transaction_date', $currentMonth)
            ->whereYear('transaction_date', $currentYear)
            ->sum('amount');

        // Pengeluaran Bulan Ini
        $pengeluaranBulanIni = Transaction::where('user_id', $user->id)
            ->where('type', 'pengeluaran')
            ->whereMonth('transaction_date', $currentMonth)
            ->whereYear('transaction_date', $currentYear)
            ->sum('amount');

        // Transaksi Terbaru (5 terakhir)
        $recentTransactions = Transaction::where('user_id', $user->id)
            ->with('category')
            ->orderBy('transaction_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Data untuk Chart (6 bulan terakhir)
        $chartData = $this->getChartData($user->id);

        return view('dashboard', compact(
            'totalSaldo',
            'totalPemasukan',
            'totalPengeluaran',
            'pemasukanBulanIni',
            'pengeluaranBulanIni',
            'recentTransactions',
            'chartData'
        ));
    }

    private function getChartData($userId)
    {
        $months = [];
        $pemasukan = [];
        $pengeluaran = [];

        // 6 bulan terakhir
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->month;
            $year = $date->year;

            // Nama bulan dalam Bahasa Indonesia
            $monthName = $date->locale('id')->format('M Y');
            $months[] = $monthName;

            // Total Pemasukan per bulan
            $pemasukan[] = Transaction::where('user_id', $userId)
                ->where('type', 'pemasukan')
                ->whereMonth('transaction_date', $month)
                ->whereYear('transaction_date', $year)
                ->sum('amount');

            // Total Pengeluaran per bulan
            $pengeluaran[] = Transaction::where('user_id', $userId)
                ->where('type', 'pengeluaran')
                ->whereMonth('transaction_date', $month)
                ->whereYear('transaction_date', $year)
                ->sum('amount');
        }

        return [
            'months' => $months,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
        ];
    }
}