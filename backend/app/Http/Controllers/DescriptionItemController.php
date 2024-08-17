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
}
