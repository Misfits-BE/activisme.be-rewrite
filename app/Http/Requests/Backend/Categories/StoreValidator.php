<?php

namespace App\Http\Requests\Backend\Categories;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreValidator
 * ---- 
 * Category store validator class. 
 * 
 * @author      TIm Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Requests\Backend\Categories
 */
class StoreValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:50', 
            'description'   => 'required|string',
        ];
    }
}
