<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return GameResource::collection($games);
    }

    public function show(Game $game)
    {
        return new GameResource($game);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:games,name',
        ]);

        $game = Game::create([
            'name' => $request->name,
        ]);

        return new GameResource($game);
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|string|unique:games,name,' . $game->id,
        ]);

        $game->update([
            'name' => $request->name,
        ]);

        return new GameResource($game);
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return response()->json(['message' => 'Game deleted successfully']);
    }
}
