<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;

class Statistic extends Model
{
	use HasFactory, HasTranslations;

	public $translatable = ['location'];

	protected $guarded = ['id'];

	public function scopeFilter($query, array $filters)
	{
		$query->when($filters['search'] ?? false, function ($query, $search) {
			$search = ucwords(strtolower($search));

			if (App::getLocale() == 'en') {
				$query->where('location->en', 'like', '%' . $search . '%');
			} else {
				$query->where('location->ka', 'like', '%' . $search . '%');
			}
		});
	}
}
