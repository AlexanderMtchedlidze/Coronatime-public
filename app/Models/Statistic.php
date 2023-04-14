<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Statistic extends Model
{
	use HasFactory;

	public function country(): BelongsTo
	{
		return $this->belongsTo(Country::class);
	}

	public static function getTotals(): array
	{
		return [
			'newCases'  => static::sum('confirmed'),
			'recovered' => static::sum('recovered'),
			'deaths'    => static::sum('deaths'),
		];
	}
}
