<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtistProfile extends Model
{
    protected $fillable = [
        'professional_title',
        'specialization',
        'commission_status',
        'turnaround_time',
        'max_active_commissions',
        'default_response_time',
        'skills',
        'instagram_username',
        'twitter_username',
        'portfolio_url',
        'artstation_username',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
