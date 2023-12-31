<?php

return [
	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	'email'             => ':attribute უნდა იყოს ვალიდური ელ-ფოსტა.',
	'max'               => [
		'string'  => ':attribute არ უნდა აღემატებოდეს :max ასოს.',
	],
	'min'        => [
		'string'  => ':attribute უნდა აღემატებოდეს :min ასოს.',
	],
	'confirmed'            => 'მითითებული :attribute არ ემთხვევა გამეორებულს.',
	'exists'               => 'მითითებული :attribute არ არსებობს.',
	'required'             => ':attribute საჭიროა.',
	'string'               => ':attribute უნდა იყოს სტრინგი.',
	'unique'               => 'მითითებული :attribute უკვე დაკავებულია.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [
		'name'                  => 'მომხმარებლის სახელი',
		'username'              => 'მომხმარებლის სახელი',
		'email'                 => 'ელ-ფოსტა',
		'password'              => 'პაროლი',
		'password_confirmation' => 'პაროლის გამეორება',
	],
];
