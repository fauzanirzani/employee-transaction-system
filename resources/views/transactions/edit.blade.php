@extends('layouts.app')
@section('title', 'Edit Transaksi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">
            <i class="fas fa-edit text-primary me-2"></i>Edit Transaksi
        </h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Edit data transaksi</p>
    </div>
    <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary btn-custom">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card-custom">
    <div class="card-body">
        <form action="{{ route('transactions.update', $transaction) }}" method="POST">
            @csrf @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Kode Transaksi</label>
                    <input type="text" class="form-control" value="{{ $transaction->transaction_code }}" disabled>
                    <small class="text-muted">Kode otomatis dibuat sistem</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Karyawan <span class="text-danger">*</span></label>
                    <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" 
                                {{ old('employee_id', $transaction->employee_id) == $employee->id ? 'selected' : '' }}>
                                {{ $employee->employee_id }} - {{ $employee->full_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jenis Transaksi <span class="text-danger">*</span></label>
                    <input type="text" name="transaction_type" class="form-control @error('transaction_type') is-invalid @enderror" 
                           value="{{ old('transaction_type', $transaction->transaction_type) }}" required>
                    @error('transaction_type') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jumlah <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" 
                               value="{{ old('amount', $transaction->amount) }}" required>
                    </div>
                    @error('amount') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Transaksi <span class="text-danger">*</span></label>
                    <input type="date" name="transaction_date" class="form-control @error('transaction_date') is-invalid @enderror" 
                           value="{{ old('transaction_date', \Carbon\Carbon::parse($transaction->transaction_date)->format('Y-m-d')) }}" required>
                    @error('transaction_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="pending" {{ old('status', $transaction->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ old('status', $transaction->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ old('status', $transaction->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                              rows="3">{{ old('description', $transaction->description) }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary-custom btn-custom">
                    <i class="fas fa-save me-1"></i> Update
                </button>
                <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary btn-custom">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection