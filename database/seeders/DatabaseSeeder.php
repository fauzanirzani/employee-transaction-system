<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create default user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@asietex.com',
            'password' => Hash::make('password'),
        ]);

        // Create sample employees
        $employees = [
            [
                'employee_id' => 'EMP001',
                'full_name' => 'Budi Santoso',
                'position' => 'Manager Produksi',
                'department' => 'Produksi',
                'email' => 'budi.santoso@asietex.com',
                'phone' => '081234567890',
                'hire_date' => '2020-01-15',
                'salary' => 15000000,
                'status' => 'active',
                'address' => 'Jl. Raya Industri No. 123, Jakarta'
            ],
            [
                'employee_id' => 'EMP002',
                'full_name' => 'Siti Rahayu',
                'position' => 'Supervisor Quality Control',
                'department' => 'Quality Control',
                'email' => 'siti.rahayu@asietex.com',
                'phone' => '081234567891',
                'hire_date' => '2020-03-20',
                'salary' => 12000000,
                'status' => 'active',
                'address' => 'Jl. Pabrik No. 45, Bandung'
            ],
            [
                'employee_id' => 'EMP003',
                'full_name' => 'Ahmad Fauzi',
                'position' => 'Staff Admin',
                'department' => 'Administrasi',
                'email' => 'ahmad.fauzi@asietex.com',
                'phone' => '081234567892',
                'hire_date' => '2021-06-10',
                'salary' => 8000000,
                'status' => 'active',
                'address' => 'Jl. Kenangan No. 78, Surabaya'
            ]
        ];

        foreach ($employees as $emp) {
            Employee::create($emp);
        }

        // Create sample transactions
        $transactions = [
            [
                'employee_id' => 1,
                'transaction_code' => 'TRX-20260624-0001',
                'transaction_type' => 'Gaji Bulanan',
                'amount' => 15000000,
                'transaction_date' => '2026-06-24',
                'description' => 'Pembayaran gaji bulan Juni 2026',
                'status' => 'approved'
            ],
            [
                'employee_id' => 2,
                'transaction_code' => 'TRX-20260624-0002',
                'transaction_type' => 'Bonus Kinerja',
                'amount' => 3000000,
                'transaction_date' => '2026-06-24',
                'description' => 'Bonus kinerja Q2 2026',
                'status' => 'approved'
            ],
            [
                'employee_id' => 3,
                'transaction_code' => 'TRX-20260624-0003',
                'transaction_type' => 'THR',
                'amount' => 8000000,
                'transaction_date' => '2026-06-24',
                'description' => 'Tunjangan Hari Raya 2026',
                'status' => 'pending'
            ]
        ];

        foreach ($transactions as $trx) {
            Transaction::create($trx);
        }
    }
}