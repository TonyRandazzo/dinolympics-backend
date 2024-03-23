<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecordResource;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        return RecordResource::collection($records);
    }

    public function show(Record $record)
    {
        return new RecordResource($record);
    }

    public function store(Request $request)
    {
        $existingRecord = Record::where('game_name', $request->game_name)->first();
    
        if ($existingRecord) {
            if ($request->score > $existingRecord->score) {
                $existingRecord->score = $request->score;
                $existingRecord->save();
            }
            
            return new RecordResource($existingRecord);
        } else {
            $record = new Record;
            $record->mission_id = $request->mission_id;
            $record->game_name = $request->game_name;
            $record->score = $request->score;
            $record->save();
    
            // Restituisci il nuovo record creato
            return new RecordResource($record);
        }
    }
    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'mission_id' => 'required|integer',
            'game_name' => 'required|string',
            'score' => 'required|integer',
        ]);
    
        $record = Record::findOrFail($id);
        $record->update($validatedData);
    
        return new RecordResource($record);
    }

    public function destroy($id)
    {
        $record = Record::find($id);
        $record->delete();

        return response()->json(['message' => 'Record deleted successfully']);
    }
}
