<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(int $int)
 */
class Catalog extends Model
{
    use HasFactory;

    // "Мягкое" удаление
    use SoftDeletes;


    protected $table = 'catalogs';
}
