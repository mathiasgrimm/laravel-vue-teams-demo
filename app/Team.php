<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    public function players()
    {
        return $this->hasMany(Player::class, 'team_id', 'id');
    }
}
