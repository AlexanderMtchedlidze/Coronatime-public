<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
	use HasFactory;

	use HasTranslations;

	public array $translatable = ['name'];

	public static function getTotals(): array
	{
		return [
			'newCases'  => static::sum('confirmed'),
			'recovered' => static::sum('recovered'),
			'deaths'    => static::sum('deaths'),
		];
	}

	public function scopeFilter($query, array $filters)
	{
		$query->when(
			$filters['name'] ?? false,
			fn ($query, $search) => $query
					->where('name->en', 'like', '%' . $search . '%')
					->orWhere('name->ka', 'like', '%' . $search . '%')
		);
	}
}
