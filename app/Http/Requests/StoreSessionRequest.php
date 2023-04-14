<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSessionRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return !auth()->check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'username' => ['required',  Rule::exists('users')->where(function ($query) {
				$query->where('name', request('username'))
					->orWhere('email', request('username'));
			})],
			'password'    => ['required'],
			'remember-me' => ['boolean'],
		];
	}
}
