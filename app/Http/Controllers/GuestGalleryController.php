<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GuestGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('images')->get();
        return view('gallery.gallery', compact('galleries'));
    }


    public function show($id)
    {
        $gallery = Gallery::with('images')->find($id);
        return view('gallery.show', compact('gallery'));
    }
}
