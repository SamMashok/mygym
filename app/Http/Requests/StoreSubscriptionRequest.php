<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubscriptionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date'      => ['required', 'date', Rule::unique('subscriptions')->where('user_id', $this->user->id)],
            'amount'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            "date.unique" => "Already Subscribed for this date."
        ];
    }
}
