<?php

namespace GitScrum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoryRequest extends FormRequest
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
            'title' => 'required|min:2',
            'product_backlog_id' => 'required|exists:product_backlogs,id',
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
            'title.required' => trans('gitscrum.user-Story-cannot-be-blank'),
            'title.min' => trans('gitscrum.user-story-must-be-at-least-2-characters'),
            'product_backlog_id.required' => trans('gitscrum.product-backlog-id-required'),
            'product_backlog_id.exists' => trans('gitscrum.product-backlog-id-exists'),
        ];
    }
}
