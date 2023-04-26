<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
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

	public function scopeFilter(Builder $query, array $filters): void
	{
		$query->when(
			$filters['name'] ?? null,
			fn ($query, $search) => $query
				->where('name->en', 'like', '%' . $search . '%')
				->orWhere('name->ka', 'like', '%' . $search . '%')
		);

		$query->when(
			($filters['sort'] ?? null) && ($filters['statistics'] ?? null),
			function ($query) use ($filters) {
				$column = $filters['statistics'] !== 'location' ? $filters['statistics']
					: 'name->' . Cookie::get('lang');
				return $query->orderBy($column, $filters['sort']);
			}
		);
	}
}
