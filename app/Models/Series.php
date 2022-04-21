<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static find(int $int)
 */
class Series extends Model
{
    use HasFactory;

    public function writers(): HasMany
    {
        return $this->hasMany(Writer::class);
    }
}
