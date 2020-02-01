<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamm extends Model
{
    protected $fillable=['name'];

    public function players()
    {
        return $this->belongsToMany(Playerr::class)->withPivot('teamm_id', 'playerr_id','created_at');
    }
}
