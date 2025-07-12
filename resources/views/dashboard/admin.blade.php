@extends('layouts.backend')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Welcome To Dashboard</h5>
                        <p class="mb-4">
                            {{ auth()->user()->role === 'admin'
                                ? 'Kamu sudah berhasil mengatur sistem dan akun dengan baik. Terima kasih Admin!'
                                : 'Kamu berhasil masuk dan siap melayani siswa hari ini. Semangat, Petugas!' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('welcome') }}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <!-- Kartu 1 -->
                        <div class="col-md-6">
                            <div class="card bg-c-red total-card">
                                <div class="card-block">
                                    <div class="text-left">
                                        <h4>{{ $totalKunjungan }}</h4>
                                        <p class="m-0">Total Kunjungan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kartu 2 -->
                        <div class="col-md-6">
                            <div class="card bg-c-green total-card">
                                <div class="card-block">
                                    <div class="text-left">
                                        <h4>{{ $jumlahSiswa }}</h4>
                                        <p class="m-0">Jumlah Siswa</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kartu 3 -->
                        <div class="col-md-6">
                            <div class="card bg-c-blue total-card">
                                <div class="card-block">
                                    <div class="text-left">
                                        <h4>{{ $jumlahObat }}</h4>
                                        <p class="m-0">Jumlah Obat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-c-yellow">
                                    <h5 class="text-dark">Grafik Kunjungan 6 Bulan Terakhir</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="kunjunganChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- /.page-body -->
            </div> <!-- /.page-wrapper -->
            <div id="styleSelector"> </div>
        </div> <!-- /.main-body -->
    </div> <!-- /.pcoded-inner-content -->
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('kunjunganChart').getContext('2d');
        const kunjunganChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: @json($data),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endpush
