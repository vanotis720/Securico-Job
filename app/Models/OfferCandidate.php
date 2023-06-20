<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferCandidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'user_id',
        'state',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class)->withDefault();
    }
}
