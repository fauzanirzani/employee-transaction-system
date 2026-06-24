@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">
            <i class="fas fa-th-large text-primary me-2"></i>Dashboard
        </h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Selamat datang kembali, {{ Auth::user()->name }}!</p>
    </div>
    <span class="badge bg-primary bg-opacity-10 text-primary p-2 px-3 rounded-pill">
        <i class="fas fa-calendar-alt me-1"></i> {{ date('d F Y') }}
    </span>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="stat-label">Total Karyawan</p>
                    <p class="stat-value">{{ $totalEmployees }}</p>
                </div>
                <div class="stat-icon primary">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: var(--secondary);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="stat-label">Karyawan Aktif</p>
                    <p class="stat-value">{{ $activeEmployees }}</p>
                </div>
                <div class="stat-icon success">
                    <i class="fas fa-user-check"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: var(--warning);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="stat-label">Total Transaksi</p>
                    <p class="stat-value">{{ $totalTransactions }}</p>
                </div>
                <div class="stat-icon warning">
                    <i class="fas fa-exchange-alt"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: var(--danger);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="stat-label">Total Nilai</p>
                    <p class="stat-value">Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
                </div>
                <div class="stat-icon danger">
                    <i class="fas fa-money-bill"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-custom">
    <div class="card-header">
        <i class="fas fa-clock text-primary me-2"></i> Transaksi Terbaru
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Karyawan</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentTransactions as $transaction)
                    <tr>
                        <td><strong>{{ $transaction->transaction_code }}</strong></td>
                        <td>{{ $transaction->employee->full_name ?? 'N/A' }}</td>
                        <td>{{ $transaction->transaction_type }}</td>
                        <td>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge-status badge-{{ $transaction->status }}">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-2x d-block mb-2"></i>
                            Belum ada transaksi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection