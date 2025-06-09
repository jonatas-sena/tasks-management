<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'priority',
        'due_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        return $query
            ->when($filters['search'] ?? null, fn($q, $value) => $q->where('title', 'ilike', "%$value%"))
            ->when($filters['status'] ?? null, fn($q, $value) => $q->where('status', $value))
            ->when($filters['priority'] ?? null, fn($q, $value) => $q->where('priority', $value))
            ->when($filters['date_from'] ?? null, fn($q, $value) => $q->whereDate('due_date', '>=', $value))
            ->when($filters['date_to'] ?? null, fn($q, $value) => $q->whereDate('due_date', '<=', $value));
    }
}
