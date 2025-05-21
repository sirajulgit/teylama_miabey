<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Exception;

class BookController extends Controller
{
    //

    public function bookList(Request $request)
    {

        try {

            $perPage = $request->input('perPage', 10);

            // dd($perPage);

            if ($perPage == "all") {

                $items = Book::where('status', '1')->orderBy("order_no", "asc")->get();

                foreach($items as $item){
                    $item->image = env("APP_URL") . '/uploads/images/' . $item->image;
                }

            } else {

                $items = Book::where('status', '1')->orderBy("order_no", "asc")->paginate($perPage);

                $items->getCollection()->transform(function ($item) {
                    $item->image = env("APP_URL") . '/uploads/images/' . $item->image;
                    return $item;
                });
            }


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
