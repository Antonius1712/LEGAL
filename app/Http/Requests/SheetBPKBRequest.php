<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SheetBPKBRequest extends FormRequest
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
            'no_claim' => 'required',
            'no_policy' => 'required',
            'insured' => 'required',
            'unit' => 'required',
            'tahun_kendaraan' => 'required',
            'nomor_polisi' => 'required',
        ];
    }
}
