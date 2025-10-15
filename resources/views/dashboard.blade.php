@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Header -->
    <div class="page-header">
        <h1>Dashboard</h1>
        <p>Selamat datang kembali, {{ Auth::user()->name }}! 👋</p>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <!-- Total Saldo -->
        <div class="stat-card primary">
            <div class="stat-header">
                <span class="stat-title">Total Saldo</span>
                <span class="stat-icon">💰</span>
            </div>
            <div class="stat-value">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</div>
        </div>

        <!-- Total Pemasukan -->
        <div class="stat-card success">
            <div class="stat-header">
                <span class="stat-title">Total Pemasukan</span>
                <span class="stat-icon">📈</span>
            </div>
            <div class="stat-value">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
        </div>

        <!-- Total Pengeluaran -->
        <div class="stat-card danger">
            <div class="stat-header">
                <span class="stat-title">Total Pengeluaran</span>
                <span class="stat-icon">📉</span>
            </div>
            <div class="stat-value">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div style="display: flex; gap: 15px; margin-bottom: 30px; flex-wrap: wrap;">
        <a href="#" class="btn btn-success">➕ Tambah Pemasukan</a>
        <a href="#" class="btn btn-danger">➖ Tambah Pengeluaran</a>
        <a href="#" class="btn btn-primary">📊 Lihat Laporan</a>
    </div>

    <!-- Content Grid -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <!-- Chart -->
        <div class="card">
            <h3 class="card-title">Grafik Keuangan (6 Bulan Terakhir)</h3>
            <canvas id="financeChart" style="max-height: 300px;"></canvas>
        </div>

        <!-- Recent Transactions -->
        <div class="card">
            <h3 class="card-title">Transaksi Terbaru</h3>
            @if ($recentTransactions->count() > 0)
                @foreach ($recentTransactions as $transaction)
                    <div
                        style="display: flex; justify-content: space-between; padding: 15px; border-bottom: 1px solid #f3f4f6;">
                        <div style="display: flex; gap: 15px;">
                            <div
                                style="font-size: 28px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background: #f3f4f6; border-radius: 12px;">
                                {{ $transaction->category->icon ?? '💵' }}
                            </div>
                            <div>
                                <h4 style="font-size: 15px; margin-bottom: 3px;">{{ $transaction->category->name }}</h4>
                                <p style="font-size: 13px; color: #999;">
                                    {{ $transaction->transaction_date->format('d M Y') }}</p>
                            </div>
                        </div>
                        <div
                            style="font-size: 16px; font-weight: bold; color: {{ $transaction->type == 'pemasukan' ? '#10b981' : '#ef4444' }};">
                            {{ $transaction->type == 'pemasukan' ? '+' : '-' }}
                            Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                        </div>
                    </div>
                @endforeach
            @else
                <div style="text-align: center; padding: 40px; color: #999;">
                    <div style="font-size: 60px; margin-bottom: 15px; opacity: 0.5;">📭</div>
                    <p>Belum ada transaksi</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const ctx = document.getElementById('financeChart').getContext('2d');
        const financeChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartData['months']),
                datasets: [{
                        label: 'Pemasukan',
                        data: @json($chartData['pemasukan']),
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Pengeluaran',
                        data: @json($chartData['pengeluaran']),
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush
