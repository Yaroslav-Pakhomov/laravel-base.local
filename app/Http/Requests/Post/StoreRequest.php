<?php

declare(strict_types = 1);

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // true - request работать будет, false - нет
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([
        'title'       => "string",
        'content'     => "string",
        'image'       => "string",
        'category_id' => "string",
        'likes'       => "string",
        'tags'        => "string"
    ])] public function rules(): array
    {
        return [
            'title'       => 'required|string',
            'content'     => 'string',
            'image'       => 'string',
            'category_id' => '',
            'likes'       => '',
            'tags'        => '',
        ];
    }
}
