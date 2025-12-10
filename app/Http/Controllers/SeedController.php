<?php

namespace App\Http\Controllers;

use App\Models\Seed;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeedController extends Controller
{
    // GET: List all seeds
    public function index()
    {
        return response()->json(Seed::all(), 200);
    }


    // GET: Show a specific seed
    public function show($id)
    {
        $seed = Seed::find($id);
        if (!$seed) {
            return response()->json(['error' => 'Seed not found'], 404);
        }
        return response()->json($seed, 200);
    }

    // POST: Create new seed
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'variety' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'supplier' => 'required|string|max:255',
            'received_date' => 'required|date',
        ]);

        $seed = Seed::create($validated);
        return response()->json($seed, 201);
    }

    // PUT/PATCH: Update existing seed
    public function update(Request $request, $id)
    {
        $seed = Seed::find($id);
        if (!$seed) {
            return response()->json(['error' => 'Seed not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'variety' => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|required|integer|min:0',
            'supplier' => 'sometimes|required|string|max:255',
            'received_date' => 'sometimes|required|date',
        ]);

        $seed->update($validated);
        return response()->json($seed, 200);
    }

    // DELETE: Remove seed (optional)
    public function destroy($id)
    {
        $seed = Seed::find($id);
        if (!$seed) {
            return response()->json(['error' => 'Seed not found'], 404);
        }

        $seed->delete();
        return response()->json(['message' => 'Seed deleted successfully'], 200);
    }
}
