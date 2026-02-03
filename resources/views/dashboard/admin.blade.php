@extends('layouts.backend')

@section('content')
    <style>
        /* Styling tambahan agar card statistik lebih "pop-up" */
        .total-card {
            border-radius: 15px;
            transition: transform 0.3s ease;
            border: none;
        }

        .total-card:hover {
            transform: translateY(-5)px;
        }

        .card-block h4 {
            font-weight: 700;
            font-size: 24px;
        }
    </style>

    <div class="container-fluid py-4">
        {{-- HEADER (Gaya Biru Examify) --}}
        <div class="mb-4">
            <div class="card border-0 shadow-sm"
                style="background: linear-gradient(135deg, #3f87f5, #4c9aff); border-radius: 20px;">
                <div class="card-body px-4 py-4 text-white">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-1">
                                Selamat Datang, {{ auth()->user()->name }} 👋
                            </h3>
                            <p class="mb-2 opacity-75">
                                @if (auth()->user()->role === 'admin')
                                    Anda memiliki akses penuh untuk mengelola sistem **UKS Digital**.
                                @else
                                    Anda login sebagai <b>Petugas</b>. Mari berikan layanan kesehatan terbaik hari ini.
                                @endif
                            </p>
                            {{-- <div class="d-flex align-items-center gap-2 opacity-75">
                                <i class="fa fa-home"></i>
                                <span>Dashboard Utama</span>
                            </div> --}}
                        </div>
                        <div class="col-md-4 text-end d-none d-md-block">
                            <i class="fa fa-desktop" style="font-size: 60px; opacity: 0.2;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CARD STATISTIK --}}
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-c-red text-white total-card shadow-sm">
                    <div class="card-block p-4 text-center">
                        <i class="ti-direction-alt f-30 m-b-10 d-block"></i>
                        <h4>{{ number_format($totalKunjungan ?? 0) }}</h4>
                        <p class="m-0 opacity-75">Total Kunjungan</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-c-green text-white total-card shadow-sm">
                    <div class="card-block p-4 text-center">
                        <i class="ti-user f-30 m-b-10 d-block"></i>
                        <h4>{{ number_format($jumlahSiswa ?? 0) }}</h4>
                        <p class="m-0 opacity-75">Jumlah Siswa</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-c-blue text-white total-card shadow-sm">
                    <div class="card-block p-4 text-center">
                        <i class="ti-package f-30 m-b-10 d-block"></i>
                        <h4>{{ number_format($jumlahObat ?? 0) }}</h4>
                        <p class="m-0 opacity-75">Stok Obat</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-c-yellow text-white total-card shadow-sm">
                    <div class="card-block p-4 text-center">
                        <i class="ti-calendar f-30 m-b-10 d-block"></i>
                        <h4>{{ number_format($jumlahJadwal ?? 0) }}</h4>
                        <p class="m-0 opacity-75">Jadwal Pemeriksaan</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- GRAFIK --}}
        @if (auth()->user()->role === 'admin')
            <div class="row mt-2">
                {{-- Grafik Kunjungan --}}
                <div class="col-md-6 mt-4">
                    <div class="card shadow-sm border-0" style="border-radius: 15px;">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold text-dark m-0"><i class="ti-bar-chart m-r-10 text-primary"></i>Tren Kunjungan
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="kunjunganChart" height="200"></canvas>
                        </div>
                    </div>
                </div>

                {{-- Grafik Obat --}}
                <div class="col-md-6 mt-4">
                    <div class="card shadow-sm border-0" style="border-radius: 15px;">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold text-dark m-0"><i class="ti-stats-up m-r-10 text-success"></i>Pemakaian Obat
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="obatChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        @if (auth()->user()->role === 'admin' && isset($labels))
            // Chart Kunjungan
            const ctxKunjungan = document.getElementById('kunjunganChart').getContext('2d');
            new Chart(ctxKunjungan, {
                type: 'line',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Jumlah Kunjungan',
                        data: {!! json_encode($data) !!},
                        borderColor: '#4c9aff',
                        backgroundColor: 'rgba(76, 154, 255, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Chart Obat
            const ctxObat = document.getElementById('obatChart').getContext('2d');
            new Chart(ctxObat, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labelObat ?? []) !!},
                    datasets: [{
                        label: 'Obat Digunakan',
                        data: {!! json_encode($dataObat ?? []) !!},
                        backgroundColor: '#2ed8b6',
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        @endif
    </script>
@endpush
