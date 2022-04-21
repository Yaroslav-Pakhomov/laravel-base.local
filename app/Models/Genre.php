<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static find(int $int)
 */
class Genre extends Model
{
    use HasFactory;

    public function writers(): BelongsToMany
    {
        return $this->belongsToMany(Writer::class);
    }
}
