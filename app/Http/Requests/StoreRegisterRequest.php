<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegisterRequest extends FormRequest
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
			'name'            => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
			'email'           => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
			'password'        => ['required', 'min:3', 'max:255', 'confirmed'],
		];
	}
}
