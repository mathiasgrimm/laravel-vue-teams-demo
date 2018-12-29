<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePlayerRequest;
use App\Transformer\PlayerTransformer;
use Illuminate\Http\Request;
use App\Player;

class PlayersController extends Controller
{
    private $playerTransformer;

    public function __construct(PlayerTransformer $playerTransformer)
    {
        $this->playerTransformer = $playerTransformer;
    }

    public function index()
    {
        $players = Player::all();

        return [
            'players' => $this->playerTransformer->transformCollection($players)
        ];
    }

    public function store(SavePlayerRequest $request)
    {
        $player = new Player();
        $player->first_name = $request->get('first_name');
        $player->last_name = $request->get('last_name');
        $player->team_id = $request->get('team_id');
        $player->save();

        return [
            'player' => $this->playerTransformer->transform($player)
        ];
    }

    public function update(SavePlayerRequest $request, $id)
    {
        $player = Player::findOrFail($id);
        $player->first_name = $request->get('first_name');
        $player->last_name = $request->get('last_name');
        $player->team_id = $request->get('team_id');
        $player->save();

        return [
            'player' => $this->playerTransformer->transform($player)
        ];
    }

    public function show($id)
    {
        $player = Player::findOrFail($id);

        return [
            'player' => $this->playerTransformer->transform($player)
        ];
    }
}
