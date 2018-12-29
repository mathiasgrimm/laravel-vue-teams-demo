<?php namespace App\Transformer;

use App\Team;

class TeamTransformer
{
    private $playerTransformer;

    public function __construct(PlayerTransformer $playerTransformer)
    {
        $this->playerTransformer = $playerTransformer;
    }

    public function transform(Team $team)
    {
        return [
            'id' => $team->id,
            'name' => $team->name,
            'created_at' => $team->created_at,
            'updated_at' => $team->updated_at,
        ];
    }

    public function transformCollection($teams)
    {
        return array_map([$this, 'transform'], $teams->all());
    }

    public function transformWithPlayers(Team $team)
    {
        return $this->transform($team) + [
            'players' => $this->playerTransformer->transformCollection($team->players),
        ];
    }
}