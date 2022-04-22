<?php

declare(strict_types = 1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const CATEGORY_ID = 'category_id';


    /**
     * @return array[]
     */
    #[ArrayShape([
        self::TITLE       => "array",
        self::CONTENT     => "array",
        self::CATEGORY_ID => "array"
    ])] protected function getCallbacks(): array
    {
        return [
            self::TITLE       => [$this, 'title'],
            self::CONTENT     => [$this, 'content'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    // $value - значение ключа GET-запроса например: ?category_id=5, $value = 5.
    public function title(Builder $builder, $value): void
    {
        $builder->where('title', 'like', "%$value%");
    }

    public function content(Builder $builder, $value): void
    {
        $builder->where('content', 'like', "%$value%");
    }

    public function categoryId(Builder $builder, $value): void
    {
        $builder->where('category_id', $value);
    }
}
