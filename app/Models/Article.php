<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $int)
 * @method static create(array $article)
 */
class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    public $fillable = ['title', 'content', 'category_id', 'tag_id'];
    // public $guarded = [];
}
