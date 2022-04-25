<?php

declare(strict_types = 1);

namespace App\Http\Resources\Post;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;
use JsonSerializable;

/**
 * @property mixed $title
 * @property mixed $content
 * @property mixed $image
 */
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    #[ArrayShape([
        'title'   => "mixed",
        'content' => "mixed",
        'image'   => "mixed"
    ])] public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'title'   => $this->title,
            'content' => $this->content,
            'image'   => $this->image,
        ];
    }
}
