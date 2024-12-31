@extends('layouts.main')

@section('container')
<!-- Tambahkan ini di bagian <head> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.3.0/apexcharts.min.js" integrity="sha512-QgLS4OmTNBq9TujITTSh0jrZxZ55CFjs4wjK8NXsBoZb04UYl8wWQJNaS8jRiLq6/c60bEfOj3cPsxadHICNfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.3.0/apexcharts.min.css" integrity="sha512-P/8zp3yWsYKLYgykcnVdWono7iWa9VXcoNLFnUhC82oBjt/6z5BIHXTQsMKBgYJjp6K+JAkt4yrID1cxfoUq+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="row">
    <div class="row">
        <!-- Total Games -->
        <div class="wg-chart-default col m-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap14">
                    <div class="image type-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                            <path d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z" fill="#22C55E"/>
                        </svg>
                    </div>
                    <div>
                        <div class="body-text mb-2">Total Game</div>
                        <h4>{{ $gameCount }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Accessories -->
        <div class="wg-chart-default col m-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap14">
                    <div class="image type-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                            <path d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z" fill="#CBD5E1"/>
                        </svg>
                    </div>
                    <div>
                        <div class="body-text mb-2">Total Aksesoris</div>
                        <h4>{{ $accessoryCount }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="wg-chart-default col m-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap14">
                    <div class="image type-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                            <path d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z" fill="#FF5200"/>
                        </svg>
                    </div>
                    <div>
                        <div class="body-text mb-2">Total Transaksi</div>
                        <h6>{{ number_format($totalCombined, 0, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="wg-chart-default col m-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap14">
                    <div class="image type-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                            <path d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z" fill="#2377FC"/>
                        </svg>
                    </div>
                    <div>
                        <div class="body-text mb-2">Total Pelanggan</div>
                        <h4>{{ $customerCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <!-- Pending Orders -->
    @if($pendingOrders->isNotEmpty())
        <div class="block-warning w-full m-3 col">
            <i class="icon-alert-octagon"></i>
            <div class="body-title-2">
                Anda memiliki {{ $pendingOrders->count() }} pesanan yang menunggu untuk diproses!
            </div>
            <a href="/daftar-pesanan" class="tf-button flex-end">Lihat Pesanan</a>
        </div>
    @endif
</div>


    <div class="row">
        <!-- Game Chart -->
        <div class="wg-box m-3 col">
            <div class="flex items-center justify-between">
                <h5>Grafik Game Terlaris</h5>
            </div>
            <div>{!! $gameChart->container() !!}</div>
        </div>

        <!-- Accessory Chart -->
        <div class="wg-box m-3 col">
            <div class="flex items-center justify-between">
                <h5>Grafik Aksesoris Terlaris</h5>
            </div>
            <div>{!! $accessoryChart->container() !!}</div>
        </div>
    </div>
    <div class="row">
       
        <div class="wg-box m-3 col">
            <div class="flex items-center justify-between">
                <h5>Grafik Pendapatan Mingguan</h5>
            </div>
            <div id="weeklyChart"></div>
        </div>
        <div class="wg-box m-3 col">
            <div class="flex items-center justify-between">
                <h5>Grafik Pendapatan Bulanan</h5>
            </div>
            <div id="monthlyChart"></div>
        </div> 
    </div>

</div>
<script>
    // Fungsi untuk format angka ke Rupiah
    function formatToRupiah(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(value);
    }

    // Data bulanan dari server
    const monthlyData = @json($combinedMonthlyRevenue);

if (monthlyData.length > 0) {
    const monthNames = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    // Pastikan data memiliki properti yang sesuai
    const monthlyLabels = monthlyData.map(data => monthNames[data.month - 1]);
    const monthlySeries = monthlyData.map(data => data.combined_total); // Gunakan combined_total

    var optionsMonthly = {
        series: [{
            name: 'Pendapatan',
            data: monthlySeries
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        xaxis: {
            categories: monthlyLabels,
            title: {
                text: 'Bulan'
            }
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return formatToRupiah(value); // Pastikan fungsi formatToRupiah ada
                }
            },
            title: {
                text: 'Pendapatan (Rupiah)'
            }
        },
        tooltip: {
            y: {
                formatter: function (value) {
                    return formatToRupiah(value); // Format tooltip menjadi Rupiah
                }
            }
        }
    };

    // Pastikan elemen DOM dengan ID #monthlyChart ada
    const chartElement = document.querySelector("#monthlyChart");

    if (chartElement) {
        var chartMonthly = new ApexCharts(chartElement, optionsMonthly);
        chartMonthly.render();
    } else {
        console.error('Elemen dengan ID #monthlyChart tidak ditemukan.');
    }
} else {
    console.warn('Data pendapatan bulanan kosong.');
}


   // Ambil data mingguan dari controller
   const weeklyLabels = @json($weeklyLabels); // Labels untuk minggu
    const weeklyData = @json($weeklyData); // Data pendapatan mingguan

    if (weeklyData.length > 0) {
        console.log(weeklyLabels); // Debug: Periksa labels
        console.log(weeklyData); // Debug: Periksa data pendapatan mingguan

        var optionsWeekly = {
            series: [{
                name: 'Pendapatan Mingguan',
                data: weeklyData // Data pendapatan mingguan dalam angka
            }],
            chart: {
                type: 'area', // Menggunakan area chart
                stacked: false, // Tidak ditumpuk
                height: 350,
                zoom: {
                    type: 'x',
                    enabled: true,
                    autoScaleYaxis: true
                },
                toolbar: {
                    autoSelected: 'zoom'
                }
            },
            dataLabels: {
                enabled: false // Menonaktifkan data labels
            },
            markers: {
                size: 0, // Menonaktifkan marker
            },
            title: {
                text: 'Grafik Pendapatan Mingguan', // Judul grafik
                align: 'left'
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    inverseColors: false,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                    stops: [0, 90, 100]
                },
            },
            yaxis: {
                labels: {
                    formatter: function (val) {
                        return formatToRupiah(val); // Format nilai Y menjadi Rupiah
                    },
                },
                title: {
                    text: 'Pendapatan (IDR)'
                },
            },
            xaxis: {
                categories: weeklyLabels, // Label untuk minggu (misalnya Minggu 1, Minggu 2, dll.)
            },
            tooltip: {
                shared: false,
                y: {
                    formatter: function (val) {
                        return formatToRupiah(val); // Format tooltip menjadi Rupiah
                    }
                }
            }
        };

        // Menampilkan grafik
        var chartWeekly = new ApexCharts(document.querySelector("#weeklyChart"), optionsWeekly);
        chartWeekly.render();
    } else {
        console.warn('Data pendapatan mingguan kosong.');
    }
</script>



<script src="{{ $gameChart->cdn() }}"></script>
{{ $gameChart->script() }}
{{ $accessoryChart->script() }}

@endsection
