@extends('layouts.app')
@section('title', 'Tambah Karyawan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">
            <i class="fas fa-user-plus text-primary me-2"></i>Tambah Karyawan
        </h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Input data karyawan baru</p>
    </div>
    <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary btn-custom">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card-custom">
    <div class="card-body">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">ID Karyawan <span class="text-danger">*</span></label>
                    <input type="text" name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" 
                           value="{{ old('employee_id') }}" required placeholder="Contoh: EMP001">
                    @error('employee_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" 
                           value="{{ old('full_name') }}" required placeholder="Nama lengkap">
                    @error('full_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jabatan <span class="text-danger">*</span></label>
                    <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" 
                           value="{{ old('position') }}" required placeholder="Jabatan">
                    @error('position') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Departemen <span class="text-danger">*</span></label>
                    <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" 
                           value="{{ old('department') }}" required placeholder="Departemen">
                    @error('department') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email') }}" required placeholder="email@domain.com">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Telepon</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                           value="{{ old('phone') }}" placeholder="08123456789">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Bergabung <span class="text-danger">*</span></label>
                    <input type="date" name="hire_date" class="form-control @error('hire_date') is-invalid @enderror" 
                           value="{{ old('hire_date') }}" required>
                    @error('hire_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Gaji <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" 
                               value="{{ old('salary') }}" required placeholder="0">
                    </div>
                    @error('salary') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" 
                              rows="3" placeholder="Alamat lengkap">{{ old('address') }}</textarea>
                    @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary-custom btn-custom">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary btn-custom">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection