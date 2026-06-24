@extends('layouts.app')
@section('title', 'Detail Karyawan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">
            <i class="fas fa-user text-primary me-2"></i>Detail Karyawan
        </h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Informasi lengkap karyawan</p>
    </div>
    <div>
        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-custom me-2">
            <i class="fas fa-edit me-1"></i> Edit
        </a>
        <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary btn-custom">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card-custom">
            <div class="card-body text-center py-4">
                <div style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                    <i class="fas fa-user" style="font-size: 3rem; color: white;"></i>
                </div>
                <h5 class="fw-bold mb-1">{{ $employee->full_name }}</h5>
                <p class="text-muted mb-2">{{ $employee->position }}</p>
                <span class="badge-status badge-{{ $employee->status }}">
                    {{ ucfirst($employee->status) }}
                </span>
                <hr>
                <div class="text-start">
                    <p class="mb-2"><strong><i class="fas fa-id-card text-primary me-2"></i>ID:</strong> {{ $employee->employee_id }}</p>
                    <p class="mb-2"><strong><i class="fas fa-envelope text-primary me-2"></i>Email:</strong> {{ $employee->email }}</p>
                    <p class="mb-2"><strong><i class="fas fa-phone text-primary me-2"></i>Telepon:</strong> {{ $employee->phone ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card-custom">
            <div class="card-header">
                <i class="fas fa-building me-2"></i> Informasi Karyawan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-muted" style="font-size: 0.85rem;">Departemen</label>
                        <p class="fw-semibold mb-0">{{ $employee->department }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted" style="font-size: 0.85rem;">Tanggal Bergabung</label>
                        <p class="fw-semibold mb-0">{{ \Carbon\Carbon::parse($employee->hire_date)->format('d F Y') }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-muted" style="font-size: 0.85rem;">Gaji</label>
                        <p class="fw-semibold mb-0">Rp {{ number_format($employee->salary, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="text-muted" style="font-size: 0.85rem;">Alamat</label>
                        <p class="fw-semibold mb-0">{{ $employee->address ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-custom mt-4">
            <div class="card-header">
                <i class="fas fa-exchange-alt me-2"></i> Riwayat Transaksi
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->transaction_code }}</td>
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
                                <td colspan="5" class="text-center text-muted py-3">
                                    <i class="fas fa-inbox me-1"></i> Belum ada transaksi
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection