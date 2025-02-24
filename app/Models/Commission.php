<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'artist_id',
        'service_id',
        'title',
        'description',
        'price',
        'currency',
        'status',
        'due_date',
        'requirements',
        'attachments',
        'progress_updates'
    ];

    protected $casts = [
        'requirements' => 'array',
        'attachments' => 'array',
        'progress_updates' => 'array',
        'price' => 'decimal:2',
        'due_date' => 'date',
        'completed_at' => 'datetime'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function artist()
    {
        return $this->belongsTo(User::class, 'artist_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeInProgress($query)
    {
        return $query->whereIn('status', ['sketching', 'inking', 'coloring', 'final_review']);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
