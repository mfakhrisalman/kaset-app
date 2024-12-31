<?php

namespace App\Charts;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KasetChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // Query untuk tabel carts dengan join tabel games
        $carts = DB::table('carts')
            ->join('games', 'carts.product_id', '=', 'games.id')
            ->select('games.name as game_name', DB::raw('SUM(carts.quantity) as total_quantity'))
            ->groupBy('games.name');

        // Query untuk tabel detail_transaksis dengan join tabel games
        $detailTransaksis = DB::table('detail_transaksis')
            ->join('games', 'detail_transaksis.name', '=', 'games.name')
            ->select('games.name as game_name', DB::raw('SUM(detail_transaksis.qty) as total_quantity'))
            ->groupBy('games.name');

        // Gabungkan query untuk games menggunakan union
        $combinedGames = $carts->unionAll($detailTransaksis);

        // Hitung total quantity berdasarkan nama game
        $resultsGames = DB::table(DB::raw("({$combinedGames->toSql()}) as combinedGames"))
            ->mergeBindings($combinedGames)
            ->select('game_name', DB::raw('SUM(total_quantity) as total_quantity'))
            ->groupBy('game_name')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();

        // Query untuk tabel carts dengan join tabel accessories
        $cartsAcc = DB::table('carts')
            ->join('accessories', 'carts.accessory_id', '=', 'accessories.id')
            ->select('accessories.name as accessory_name', DB::raw('SUM(carts.quantity) as total_quantity'))
            ->groupBy('accessories.name');

        // Query untuk tabel detail_transaksis dengan join tabel accessories
        $detailTransaksisAcc = DB::table('detail_transaksis')
            ->join('accessories', 'detail_transaksis.name', '=', 'accessories.name')
            ->select('accessories.name as accessory_name', DB::raw('SUM(detail_transaksis.qty) as total_quantity'))
            ->groupBy('accessories.name');

        // Gabungkan query untuk accessories menggunakan union
        $combinedAccessories = $cartsAcc->unionAll($detailTransaksisAcc);

        // Hitung total quantity berdasarkan nama accessory
        $resultsAccessories = DB::table(DB::raw("({$combinedAccessories->toSql()}) as combinedAccessories"))
            ->mergeBindings($combinedAccessories)
            ->select('accessory_name', DB::raw('SUM(total_quantity) as total_quantity'))
            ->groupBy('accessory_name')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();

        // Membuat array label dan data untuk games
        $labelsGames = $resultsGames->pluck('game_name')->toArray();
        $dataGames = $resultsGames->pluck('total_quantity')->toArray();

        // Membuat array label dan data untuk accessories
        $labelsAccessories = $resultsAccessories->pluck('accessory_name')->toArray();
        $dataAccessories = $resultsAccessories->pluck('total_quantity')->toArray();

        // Membuat bar chart untuk games
        $chartGames = $this->chart->barChart()
            ->setTitle('Kaset Game Terlaris')
            ->setSubtitle('Top 5 Kaset Game dengan Penjualan Tertinggi')
            ->addData('Game Terjual', $dataGames)
            ->setXAxis($labelsGames);

        // Membuat bar chart untuk accessories
        $chartAccessories = $this->chart->barChart()
            ->setTitle('Aksesoris Terlaris')
            ->setSubtitle('Top 5 Aksesoris dengan Penjualan Tertinggi')
            ->addData('Aksesoris Terjual', $dataAccessories)
            ->setXAxis($labelsAccessories)
            ->setColors(['#FF0000']); 
            
        // Mengembalikan kedua chart
        return [
            'chartGames' => $chartGames,
            'chartAccessories' => $chartAccessories,
        ];
    }
}
