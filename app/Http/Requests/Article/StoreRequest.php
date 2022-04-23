<?php

declare(strict_types = 1);

namespace App\Http\Requests\Article;

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
        'category_id' => "string",
        'tag_id'      => "string"
    ])] public function rules(): array
    {
        return [
            'title'       => 'string',
            'content'     => 'string',
            'category_id' => 'integer',
            'tag_id'      => 'integer',
        ];
    }
}
