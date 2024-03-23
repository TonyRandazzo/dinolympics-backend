<?php

namespace App\Http\Controllers;

use App\Http\Resources\MissionResource;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::all();
        return MissionResource::collection($missions);
    }

    public function show(Mission $mission)
    {
        return new MissionResource($mission);
    }
    public function deleteShopper(Request $request)
    {
        $request->validate([
            'shopper_id' => 'required|integer|exists:missions,id',
        ]);
        Mission::destroy($request->input('shopper_id'));

        return response()->json(['message' => 'Record del shopper eliminato con successo'], 200);
    }
    public function deleteChampion(Request $request)
{
    $request->validate([
        'mission_id' => 'required|integer|exists:missions,id',
    ]);
    Mission::destroy($request->input('mission_id'));

    return response()->json(['message' => 'Record della missione eliminato con successo'], 200);
}
public function deleteAthlete(Request $request)
{
    $request->validate([
        'mission_id' => 'required|integer|exists:missions,id',
    ]);
    Mission::destroy($request->input('mission_id'));

    return response()->json(['message' => 'Record della missione eliminato con successo'], 200);
}
}