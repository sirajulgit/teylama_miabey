<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Book;

class BookController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Book';
        $data['activePageName'] = 'book';
        $data['activeSubMenu'] = '';

        $items = Book::orderBy("order_no", "asc")->get();

        $temp_arr = [];
        foreach ($items as $item) {

            $default_image = '/uploads/images/' . $item['image'];

            $item->image = $default_image;

            array_push($temp_arr, $item);
        }


        $data['items'] = $temp_arr;

        return view("admin.book_list", ["data" => $data]);
    }


    public function create()
    {

        $items = Book::orderBy("order_no", "desc")->first();
        // dd($items);

        $data = array();
        $data['pageTitle'] = 'Book';
        $data['activePageName'] = 'book';
        $data['activeSubMenu'] = '';
        $data['order_no'] = $items->order_no + 1;


        return view("admin.book_create", ["data" => $data]);
    }


    public function post_create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            // 'price' => 'required',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'link' => 'required|url',
            'order_no'=>'required'
        ]);

        // $items = Book::where("order_no", $request->order_no)->get()->toArray();
        // if(count($items)>0)
        // {
        // }


        // return response()->json(['status' => true, 'validData' => $validData]);

        // dd($request->all());

        $imageName = image_convert_webp($request->image);

        // image_resize($imageName, 148, 221);


        $data = new Book();
        $data->title = $request->title;
        // $data->price = $request->price;
        $data->details = $request->details;
        $data->image = $imageName;
        $data->link = $request->link;
        $data->order_no = $request->order_no;
        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }


    public function update(Request $request)
    {

        $item = Book::find($request->id);

        $default_image = '/uploads/images/' . $item->image;

        $item->image = $default_image;


        $data = array();
        $data['pageTitle'] = 'Book';
        $data['activePageName'] = 'book';
        $data['activeSubMenu'] = '';

        $data['item'] = $item;

        return view("admin.book_edit", ["data" => $data]);
    }


    public function post_update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            // 'price' => 'required',
            'details' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp',
            'link' => 'required|url',
            'status' => 'required',
            'order_no'=>'required'
        ]);

        $old_image_name = Book::find($request->id)->image;

        if ($request->image) {

            $imageName = image_convert_webp($request->image);

            // image_resize($imageName, 148, 221);

            $image_path = public_path('uploads/images/' . $old_image_name);
            $resize_image_path = public_path('uploads/images/resize' . $old_image_name);

            if (file_exists($image_path)) {
                unlink($image_path);
            }

            if (file_exists($resize_image_path)) {
                unlink($resize_image_path);
            }
        } else {

            $imageName = $old_image_name;
        }


        //////////// order reArrange ///////////
        $book = Book::findOrFail($request->id);
        $currentOrder = $book->order_no;
        $newOrder=$request->order_no;

        if ($newOrder != $currentOrder) {
            if ($newOrder > $currentOrder) {
                Book::whereBetween('order_no', [$currentOrder + 1, $newOrder])->decrement('order_no');
            } else {
                Book::whereBetween('order_no', [$newOrder, $currentOrder - 1])->increment('order_no');
            }
        }


        Book::where("id", $request->id)->update([
            'title' => $request->title,
            // 'price' => $request->price,
            'details' => $request->details,
            'image' => $imageName,
            'link' => $request->link,
            'order_no' => $newOrder,
            'status' => $request->status,
        ]);

        return redirect()->back()->with("success", "Update Successful");
    }


    public function delete(Request $request)
    {

        $item = Book::find($request->id);


        $image_path = public_path('uploads/images/' . $item->image);
        $resize_image_path = public_path('uploads/images/resize' . $item->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        if (file_exists($resize_image_path)) {
            unlink($resize_image_path);
        }



        Book::where('id', $request->id)->delete();

        // return redirect()->route('book_list')->with("success", "delete done");
        return response()->json(['status' => true, 'msg' => 'delete done']);
    }


    public function status_change(Request $request)
    {

        $status = $request->status;
        $status = $status == 1 ? 0 : 1;

        Book::where("id", $request->id)->update([
            'status' => $status,
        ]);

        return response()->json(['status' => true, 'msg' => 'Status Change Successfully']);
    }
}
