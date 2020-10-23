<?php

namespace App\Http\Requests\Stores;

use Illuminate\Foundation\Http\FormRequest;

class StoreExcel extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' =>  'required|mimes:xls,xlsx',
        ];
    }


}
