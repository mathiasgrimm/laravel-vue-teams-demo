<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTeamRequest;
use App\Team;
use App\Transformer\TeamTransformer;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    private $teamTransformer;

    public function __construct(TeamTransformer $teamTransformer)
    {
        $this->teamTransformer = $teamTransformer;
    }

    public function index()
    {
        $teams = Team::all();

        return [
            'teams' => $this->teamTransformer->transformCollection($teams)
        ];
    }

    public function listPlayers($teamId)
    {
        $team = Team::findOrFail($teamId);
        $data = $this->teamTransformer->transformWithPlayers($team);

        return [
            'team' => $data
        ];
    }

    public function store(SaveTeamRequest $request)
    {
        $team = new Team();
        $team->name = $request->get('name');
        $team->save();

        return [
            'team' => $this->teamTransformer->transform($team)
        ];
    }

    public function update(SaveTeamRequest $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->name = $request->get('name');
        $team->save();

        $data = $this->teamTransformer->transformWithPlayers($team);

        return [
            'team' => $data
        ];
    }
}
