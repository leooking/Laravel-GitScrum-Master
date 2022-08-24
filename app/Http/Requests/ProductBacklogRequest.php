<?php

namespace GitScrum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductBacklogRequest extends FormRequest
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
            'organization_id' => 'required|exists:organizations,id',
            'title' => 'required|min:2|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => trans('gitscrum.title-for-backlog-product-cannot-be-blank'),
            'title.min' => trans('gitscrum.title-must-be-at-least-2-characters'),
            'title.max' => trans('gitscrum.title-must-be-between-2-and-255-characters'),
            'organization_id.required' => trans('gitscrum.organization-id-required'),
            'organization_id.exists' => trans('gitscrum.organization-id-exists'),
        ];
    }
}
