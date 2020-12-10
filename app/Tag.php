<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function contents() {
        return $this->morphedByMany(Content::class, 'taggable');
    }
}
