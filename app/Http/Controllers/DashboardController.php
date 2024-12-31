<?php

namespace App\Http\Controllers;

use App\Charts\KasetChart;
use App\Models\Accessory;
use App\Models\Cart;
use App\Models\Game;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung data utama untuk dashboard
        $gameCount = Game::count();
        $accessoryCount = Accessory::count();
        $customerCount = User::where('is_pelanggan', true)->count();
        $totalRevenue = Transaksi::sum('total_amount');
        $totalCart = Cart::whereIn('no_transaksi', function ($query) {
            $query->select(DB::raw('DISTINCT no_transaksi'))
                ->from('carts')
                ->whereIn('status', ['Diproses', 'Diantar', 'Selesai', 'Menunggu di Ambil']); // Menambahkan kondisi status
        })->sum('total');
        $totalCombined = $totalRevenue + $totalCart;
        // Membuat instance LarapexChart
        $larapexChart = new LarapexChart();

        // Membuat grafik KasetChart dengan mengirimkan instance LarapexChart
        $kasetChart = new KasetChart($larapexChart);
        $charts = $kasetChart->build();
        $gameChart = $charts['chartGames'];
        $accessoryChart = $charts['chartAccessories'];

        // Mendapatkan data pesanan yang sedang diproses
        $pendingOrders = Cart::where('status', 'Diproses')->get();

        // Mendapatkan data pendapatan bulanan
            $monthlyRevenueCart = DB::table('transaksis')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_amount) as total'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();
        
            $monthlyRevenue = DB::table('carts')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total) as total'))
            ->whereIn('no_transaksi', function ($query) {
                $query->select(DB::raw('DISTINCT no_transaksi'))
                    ->from('carts')
                    ->whereIn('status', ['Diproses', 'Diantar', 'Selesai', 'Menunggu di Ambil']);
            })
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();
        
        
            $combinedMonthlyRevenue = $monthlyRevenueCart->map(function ($cartRevenue) use ($monthlyRevenue) {
                $cartData = $monthlyRevenue->firstWhere('month', $cartRevenue->month);
                return [
                    'month' => $cartRevenue->month,
                    'transaksi_total' => $cartRevenue->total,
                    'cart_total' => $cartData->total ?? 0, // Gunakan 0 jika data tidak ditemukan
                    'combined_total' => $cartRevenue->total + ($cartData->total ?? 0),
                ];
            });
            
            // Tambahkan data dari `$monthlyRevenue` yang tidak ada di `$monthlyRevenueCart`
            $additionalCartData = $monthlyRevenue->filter(function ($cartData) use ($monthlyRevenueCart) {
                return !$monthlyRevenueCart->contains('month', $cartData->month);
            })->map(function ($cartData) {
                return [
                    'month' => $cartData->month,
                    'transaksi_total' => 0, // Tidak ada data dari `transaksis`
                    'cart_total' => $cartData->total,
                    'combined_total' => $cartData->total,
                ];
            });
            
            $combinedMonthlyRevenue = $combinedMonthlyRevenue->merge($additionalCartData);
// Mengambil data mingguan dari transaksis
$weeklyRevenueCart = DB::table('transaksis')
    ->select(DB::raw('WEEK(created_at) as week'), DB::raw('SUM(total_amount) as total'))
    ->whereRaw('WEEK(created_at) > 0') // Memastikan minggu yang valid
    ->groupBy(DB::raw('WEEK(created_at)'))
    ->orderBy('week')
    ->get();

// Mengambil data mingguan dari carts
$weeklyRevenue = DB::table('carts')
    ->select(DB::raw('WEEK(created_at) as week'), DB::raw('SUM(total) as total'))
    ->whereIn('status', ['Diproses', 'Diantar', 'Selesai', 'Menunggu di Ambil'])
    ->groupBy(DB::raw('WEEK(created_at)'))
    ->orderBy('week')
    ->get();

// Gabungkan kedua dataset berdasarkan minggu
$combinedWeeklyRevenue = $weeklyRevenue->map(function ($cartRevenue) use ($weeklyRevenueCart) {
    $cartData = $weeklyRevenueCart->firstWhere('week', $cartRevenue->week);
    return [
        'week' => $cartRevenue->week,
        'transaksi_total' => $cartRevenue->total,
        'cart_total' => $cartData->total ?? 0, // Gunakan 0 jika data tidak ditemukan
        'combined_total' => $cartRevenue->total + ($cartData->total ?? 0),
    ];
});

// Tambahkan data dari $weeklyRevenueCart yang tidak ada di $weeklyRevenue
$additionalCartData = $weeklyRevenueCart->filter(function ($cartData) use ($weeklyRevenue) {
    return !$weeklyRevenue->contains('week', $cartData->week);
})->map(function ($cartData) {
    return [
        'week' => $cartData->week,
        'transaksi_total' => 0, // Tidak ada data dari carts
        'cart_total' => $cartData->total,
        'combined_total' => $cartData->total,
    ];
});

$combinedWeeklyRevenue = $combinedWeeklyRevenue->merge($additionalCartData);

// Memformat data mingguan untuk grafik
$weeklyLabels = $combinedWeeklyRevenue->pluck('week')->map(function ($week) {
    return 'Minggu ' . $week; // Menampilkan 'Minggu' diikuti dengan nomor minggu
})->toArray();

$weeklyData = $combinedWeeklyRevenue->pluck('combined_total')->toArray();

// Mengirimkan data ke view
return view('dashboard', compact(
    'gameCount',
    'accessoryCount',
    'customerCount',
    'totalCombined',
    'gameChart',
    'accessoryChart',
    'pendingOrders',
    'monthlyRevenue',
    'weeklyRevenue', // Pastikan ini adalah data yang sudah digabung
    'combinedMonthlyRevenue',
    'weeklyLabels', // Kirimkan labels mingguan
    'weeklyData' // Kirimkan data mingguan yang sudah digabung
));
    }}
