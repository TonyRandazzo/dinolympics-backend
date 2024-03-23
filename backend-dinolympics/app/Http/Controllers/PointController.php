<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Http\Resources\PointResource;
use Illuminate\Support\Facades\DB;


class PointController extends Controller
{

    public function index()
    {
        $points = Point::all();
        return PointResource::collection($points);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'game' => 'required|string',
            'points' => 'required|integer',
        ]);

        $gamePoint = Point::create($validatedData);

        return new PointResource($gamePoint);
    }
    public function maxPoints()
    {
        $maxPoints = Point::select('game', DB::raw('MAX(points) as max_points'))
            ->groupBy('game')
            ->get();

        return response()->json(['data' => $maxPoints]);
    }
    public function update(Request $request, $id)
    {
        $point = Point::findOrFail($id);
    
        $request->validate([
            'game' => 'required|string',
            'points' => 'required|integer',
        ]);
    
        $game = $request->input('game');
        $points = $request->input('points');
    
        $point->update(['game' => $game, 'points' => $points]);
    
        return new PointResource($point);
    }
    
}
