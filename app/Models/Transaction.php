<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'transaction_code',
        'transaction_type',
        'amount',
        'transaction_date',
        'description',
        'status'
    ];

    protected $casts = [
    'transaction_date' => 'date',
    'amount' => 'decimal:2',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}