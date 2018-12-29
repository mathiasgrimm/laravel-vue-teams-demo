<?php namespace App\Transformer;

use App\Player;

class PlayerTransformer
{
    public function transform(Player $player)
    {
        return [
            'id' => $player->id,
            'team_id' => $player->team_id,
            'first_name' => $player->first_name,
            'last_name' => $player->last_name,
            'created_at' => $player->created_at,
            'updated_at' => $player->updated_at,
        ];
    }

    public function transformCollection($players)
    {
        return array_map([$this, 'transform'], $players->all());
    }
}