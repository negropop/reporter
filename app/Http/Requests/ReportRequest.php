<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'name' => 'required',
            'sface' => 'required',
            'thief' => 'required',
            'tface' => 'required',
            'tmobile' => 'required',
            'screen' => 'required',
        ];
    
    }

    public function messages()
{
    return [
        'name.required' => __('messages.name.required')        ,
        'sface.required' =>  __('messages.sface.required') ,
        'thief.required' => __('messages.thief.required') ,
        'tface.required' => __('messages.tface.required'),
        'tmobile.required' => __('messages.tmobile.required'),
        'screen.required' => __('messages.screen.required'),
    ];
}


}
