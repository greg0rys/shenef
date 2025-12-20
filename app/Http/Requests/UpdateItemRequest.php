<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'make' => 'string|required',
            'model' => 'string|required',
            'asset_id' => 'integer|required',
            'deployment_status' => 'string|required',
            'notes' => 'string|required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
