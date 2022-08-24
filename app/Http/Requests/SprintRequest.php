<?php

namespace GitScrum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class SprintRequest extends FormRequest
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
            'title' => 'required|min:2|max:255',
            'date_start' => 'required',
            'date_finish' => 'required',
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
            'title.required' => trans('gitscrum.title-for-sprint-cannot-be-blank'),
            'title.min' => trans('gitscrum.title-must-be-at-least-2-characters'),
            'title.max' => trans('gitscrum.title-must-be-between-2-and-255-characters'),
            'date_start.required' => trans('gitscrum.date-to-start-cannot-be-blank'),
            'date_finish.required' => trans('gitscrum.date-to-finish-cannot-be-blank'),
            'product_backlog_id.required' => trans('gitscrum.product-backlog-id-required'),
            'product_backlog_id.exists' => trans('gitscrum.product-backlog-id-exists'),
        ];
    }

    protected function getValidatorInstance()
    {
        $data = $this->all();

        $date = explode(' - ', $data['daterange']);
        $data['date_start'] = !empty($date[0]) ? Carbon::createFromFormat('Y-m-d', trim($date[0]))->toDateString() : null;
        $data['date_finish'] = !empty($date[1]) ? Carbon::createFromFormat('Y-m-d', trim($date[1]))->toDateString() : null;
        unset($data['daterange']);
        $this->getInputSource()->replace($data);

        return parent::getValidatorInstance();
    }
}
