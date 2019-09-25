<?php

namespace App\Http\Requests;

use App\Helpers\Id;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAsset extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = Id::get($this->route('asset'));

        return [
            'number' => 'required|string|max:20|unique:assets,number, ' . $id,
            'description' => 'required|string|max:191',
            'brand' => 'nullable|string|max:50',
            'model' => 'nullable|string|max:50',
            'reference' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:50',
        ];
    }
}