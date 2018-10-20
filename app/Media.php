<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['path', 'filename', 'extension', 'type'];

    public function image()
    {
    	return $this->belongsTo(Image::class);
    }
}
