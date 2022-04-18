<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, int $int)
 * @method static find(int $int)
 * @method static create(array $array)
 * @method static firstOrCreate(array $array, array $array1)
 * @method static updateOrCreate(string[] $array, array $array1)
 */
class Post extends Model
{
    use HasFactory;

    // "Мягкое" удаление
    use SoftDeletes;

    protected $table = 'posts';
    // Разрешаем добавление данных, способы разрешения:
    /**
     * $fillable указываем, что разрешаем заполнять,
     * а в $guarded что запрещаем.
     */
    public $guarded = [];
    // public $guarded = false;
    // public $fillable = ['title', 'content', 'image', 'likes', 'is_published'];

}
