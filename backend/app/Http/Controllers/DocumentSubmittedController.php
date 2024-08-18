<?php

namespace App\Http\Controllers;

use App\Models\DocumentSubmitted;
use Illuminate\Http\Request;

class DocumentSubmittedController extends Controller
{
    public function index()
    {
        $documents = DocumentSubmitted::all();

        return response()->json([
            'documents' => $documents,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $document = DocumentSubmitted::create($request->all());

        return response()->json([
            'name' => $document,
        ], 200);
    }
}
