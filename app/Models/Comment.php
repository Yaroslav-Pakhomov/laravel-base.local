<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $data)
 * @property mixed $id
 */
class Comment extends Model
{
    use HasFactory;

    // "Мягкое" удаление
    use SoftDeletes;

    protected $table = 'comments';

    // Разрешённые поля для ввода
    public $fillable = ['Author', 'text'];
}
