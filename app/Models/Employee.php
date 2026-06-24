<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'full_name',
        'position',
        'department',
        'email',
        'phone',
        'hire_date',
        'salary',
        'status',
        'address'
    ];

    protected $casts = [
    'hire_date' => 'date',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}