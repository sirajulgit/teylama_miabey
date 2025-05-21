<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Bibliography;
use Illuminate\Http\Request;
use Exception;

class BibliographyController extends Controller
{
    //

    public function index(Request $request)
    {
        try {

            $items = Bibliography::where('status', '1')->orderBy("id", "desc")->get();

            return response()->json([
                "status" => true,
                "data" => $items
            ], 200);
        } catch (Exception $ex) {

            return response()->json([
                "status" => false,
                "error" => $ex->getMessage()
            ], 201);
        }
    }
}
