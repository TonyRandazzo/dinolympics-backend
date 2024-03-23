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
        $request->validate([
            'available' => 'required|boolean',
            'img' => 'required|string',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);
    
        $skin = new Skin([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'available' => $request->input('available'),
            'img' => $request->input('img'),
            'quantity' => $request->input('quantity')
        ]);
    
        $skin->save();
    
        return new SkinResource($skin);
    }
    
}
