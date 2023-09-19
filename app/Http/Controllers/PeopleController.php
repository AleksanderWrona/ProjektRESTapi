<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Http\Requests\StorePeopleRequest;
use App\Http\Requests\UpdatePeopleRequest;
use Illuminate\Http\JsonResponse;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(People::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeopleRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $people = People::create($validatedData);

        if ($people) {
            return response()->json(['id' => $people->id], 201);
        } else {
            return response()->noContent(500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $person = People::findOrFail($id);
        return response()->json(['data' => $person], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeopleRequest $request)
    {
        $id = $request->route('id');
        $validatedData = $request->validated();
        $result = People::where('id', $id)->update($validatedData);

        if ($result) {
            return response()->noContent(204);
        } else {
            return response()->noContent(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $person = People::findOrFail($id);
        $person->delete();
        
        return response()->noContent(204);
    }
}