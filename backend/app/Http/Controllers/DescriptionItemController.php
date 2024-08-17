<?php

namespace App\Http\Controllers;

use App\Models\DescriptionItem;
use Illuminate\Http\Request;

class DescriptionItemController extends Controller
{
    public function index()
    {
        $descriptions = DescriptionItem::all();

        return response()->json([
            'descriptions' => $descriptions,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $description = DescriptionItem::create($request->all());

        return response()->json([
            'name' => $description,
        ], 200);
    }
}
