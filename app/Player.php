<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable=['team_ids','first_name','last_name'];


    public function getTeamIdsAttribute($value)
    {
        return explode(',' , $value);
    }
//and mutatur(before db)
    public function setTeamIdsAttribute($value)
    {
        return $this->attributes['team_ids'] = implode(',', $value);
    }
}
