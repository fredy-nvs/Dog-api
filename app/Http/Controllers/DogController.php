<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DogController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json(Dog::paginate(10));
    }

    public function findById(int $id): JsonResponse
    {
        $dog = Dog::find($id);

        if ($dog != null) {
            return response()->json($dog);
        }
        return response()->json(["message" => "The dog with id $id  was not found"]);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(Dog::create($request->all()), 201);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $dog = Dog::find($id);
        $dog->update($request->all());

        return response()->json($dog);
    }

    public function delete(int $id): JsonResponse
    {
        $dog = Dog::find($id);

        if ($dog != null) {
            $dog->delete();
            return response()->json(["message" => "Dog with id $id deleted successfully"]);
        }
        return response()->json(["message" => "The dog with id $id  was not found"]);
    }

}
