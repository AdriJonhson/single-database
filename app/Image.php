<?php

namespace App;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = ['media_id', 'tenant_id'];

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope(new TenantScope);
	}

	public function media()
	{
		return $this->belongsTo(Media::class);
	}
}
