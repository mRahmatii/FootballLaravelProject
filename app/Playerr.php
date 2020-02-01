<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playerr extends Model
{
    protected $fillable=['first_name','last_name'];

    public function teams()
    {
        return $this->belongsToMany(Teamm::class)->withPivot('teamm_id');
    }
}
