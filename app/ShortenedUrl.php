<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class ShortenedUrl extends Model
{
    protected $guarded = [];

    public function setAliasAttribute($value)
    {
        if ($value === null || $value === '') {
            $this->attributes['alias'] = str_random(5) . strtotime('now');
        } else {
            $this->attributes['alias'] = $value;
        }
    }

    public function getHashidAttribute($value)
    {
        return Hashids::encode($this->id);
    }
}
