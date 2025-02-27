<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    use HasFactory;
}
