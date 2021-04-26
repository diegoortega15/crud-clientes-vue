<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCustomerFormRequest extends FormRequest
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
        return [
            'name' => "required|min:3|max:100:customers, name, {$this->id},id",
            'email' => "required:customers, email, {$this->id},id",
            'birthday' => "required:customers, birthday, {$this->id},id",
            'address' => "required:customers, address, {$this->id},id",
            'zip_code' => "required|min:8|max:8:customers, zip_code, {$this->id},id",
            'city' => "required:customers, city, {$this->id},id",
            'state' => "required:customers, state, {$this->id},id",
        ];
    }
}
