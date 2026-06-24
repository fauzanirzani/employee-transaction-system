<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('status', 'active')->count();
        $totalTransactions = Transaction::count();
        $totalAmount = Transaction::sum('amount');
        $recentTransactions = Transaction::with('employee')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalEmployees',
            'activeEmployees',
            'totalTransactions',
            'totalAmount',
            'recentTransactions'
        ));
    }
}