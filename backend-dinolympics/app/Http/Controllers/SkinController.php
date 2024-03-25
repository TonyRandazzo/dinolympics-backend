<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skin;
use App\Http\Resources\SkinResource;

class SkinController extends Controller
{
    public function index()
    {
        $skins = Skin::all();
        return SkinResource::collection($skins);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'available' => 'required|boolean',
            'description' => 'required|string',
            'img' => 'required|string',
            'quantity' => 'required|numeric'
        ]);

        $skin = Skin::create($validatedData);
        
        return new SkinResource($skin);
    }
    
}
