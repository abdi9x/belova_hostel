<?php

namespace App\Http\Controllers;

use App\Models\Room_category;
use App\Models\Room_category_image;
use App\Models\Rooms;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $images = Room_category_image::all();
        $rooms = Room_category::with('images')->with('pricelist')->get();
        return view('home')->with('rooms', $rooms)->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function rooms()
    {
        $rooms = Room_category::with('images')->with('pricelist')->get();
        // return response()->json($rooms);
        return view('rooms')->with('rooms', $rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function fasilitas()
    {
        $rooms = Rooms::count();
        $public_image = Room_category_image::where('tag', 'public')->get();
        return view('fasilitas')->with('images', $public_image)->with('counts', $rooms);
    }

    /**
     * Display the specified resource.
     */
    public function galery()
    {
        $tag = Room_category_image::select('tag')->distinct()->get();
        $images = Room_category_image::all();
        return view('galery')->with('images', $images)->with('tag', $tag);
    }
    public function view_room($slug)
    {
        $rooms = Room_category::with('images')->with('pricelist')->where('slug', '!=', $slug)->get();
        $room = Room_category::where('slug', $slug)->with('images')->with('pricelist')->first();
        return view('room')->with('room', $room)->with('rooms', $rooms);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
