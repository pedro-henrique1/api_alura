<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function list(): JsonResponse
    {
        $results = Recipe::all();

        return response()->json(
            ["data" => $results, "message" => "", "error" => ""]);

    }

    public function create(Request $request): JsonResponse
    {
        $create = new Recipe();
        $create->description = $request->description;
        $create->valor = $request->valor;
        $create->data = $request->data;
        $create->save();

        return response()->json(
            ["data" => $create, "message" => "Recipe Saved", "error" => ""], 201);

    }


    public function detail($id): JsonResponse
    {
        $detail = Recipe::all()->find($id);

        return response()->json(
            ["data" => $detail, "message" => "", "error" => ""]);
    }

    public function update(Request $request ,$id): JsonResponse
    {
        $update = Recipe::all()->find($id);
        $update->description = $request->description;
        $update->valor = $request->valor;
        $update->data = $request->data;
        $update->save();

        return response()->json(
            ["data" => $update, "message" => "Recipe updated", "error" => ""]);

    }

    public function delete($id): JsonResponse
    {
        $delete = Recipe::all()->find($id)->delete();

        return response()->json(
            ["data" => $delete, "message" => "Recipe delete", "error" => ""]);
    }
}
