<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(int $int)
 * @method static create(array $article)
 */
class Article extends Model
{
    use HasFactory;

    // "Мягкое" удаление
    use SoftDeletes;

    protected $table = 'articles';

    // Разрешённые поля для ввода
    public $fillable = ['title', 'content', 'category_id', 'tag_id'];
}
