<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function list(): JsonResponse
    {
        $results = Expense::all();

        return response()->json(
            [
                "data" => $results,
                "message" => "",
                "error" => ""
            ],
            200
        );
    }

    public function create(Request $request)
    {
        $validate = DB::table('recipes')
            ->where("description", "=", $request->description)
            ->whereDate("data", $request->data)->first();

        if ($validate == null) {
            $create = new Expense();
            $create->description = $request->description;
            $create->valor = $request->valor;
            $create->data = $request->data;
            $create->save();
            return response()->json(
                [
                    "data" => $create,
                    "message" => "Expense Saved",
                    "error" => ""
                ],
                201
            );
        } else {
            return  response()->json(
                [
                    "data" => $validate,
                    "message" => "Duplicate registration",
                    "error" => ""
                ],
                400
            );
        }
    }


    public function detail($id): JsonResponse
    {
        $detail = Expense::all()->find($id);

        return response()->json(
            ["data" => $detail, "message" => "", "error" => ""],
            200
        );
    }

    public function update(Request $request, $id): JsonResponse
    {
        $update = Expense::all()->find($id);
        $update->description = $request->description;
        $update->valor = $request->valor;
        $update->data = $request->data;
        $update->save();

        return response()->json(
            ["data" => $update, "message" => "Expense updated", "error" => ""],
            200
        );
    }

    public function delete($id): JsonResponse
    {
        $delete = Expense::all()->find($id)->delete();

        return response()->json(
            ["data" => $delete, "message" => "Recipe delete", "error" => ""],
            200
        );
    }
}
