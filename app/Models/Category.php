<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(int $int)
 * @method static create(array $data)
 */
class Category extends Model
{
    use HasFactory;

    // "Мягкое" удаление
    use SoftDeletes;

    protected $table = 'categories';

    // Запрещённые поля для ввода
    public $guarded = [];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
