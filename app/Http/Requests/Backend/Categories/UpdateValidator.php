<?php

namespace App\Http\Requests\Backend\Categories;

use Illuminate\Foundation\Http\FormRequest;

/*
 * Class UpdateValidato' 
 * ---- 
 * The validator class for updating a catgoriy. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Requests\Backend\Categories
 */
class UpdateValidator extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'description' => 'required|string',
        ];
    }
}
