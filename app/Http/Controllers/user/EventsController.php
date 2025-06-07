<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;


class EventsController extends Controller
{
    //

    public function index(Request $request)
    {
        $data = [
            'page_title' => 'Events',
            'activePageName' => 'event',
        ];


        $items = Event::orderBy('id', 'desc')->paginate(6);

        $items->getCollection()->transform(function ($item) {
            if (!is_null($item->image)) {
                $default_image = '/uploads/images/' . $item->image;
                $item->image = $default_image;
            }
            return $item;
        });

        $data['event_data'] = $items;


        return view('user.event', ['data' => $data]);
    }



    public function event_details($slug)
    {

        $data = [
            'page_title' => 'Event Details',
            'activePageName' => 'event',
        ];


        $eventData = Event::where('slug', $slug)->first();

        if (!$eventData) {
            return redirect()->back()->with('error', 'event not found');
        }

        if ($eventData->image) {
            $default_image = '/uploads/images/' . $eventData->image;
            $eventData->image = $default_image;
        }

        $data['event_data'] = $eventData;

        return view('user.event_detail', ['data' => $data]);
    }
}
