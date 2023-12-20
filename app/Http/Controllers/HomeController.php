<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $artworks_ten = Artwork::inRandomOrder()->limit(10)->get()->chunk(5);
        $artworks_four = Artwork::inRandomOrder()->limit(4)->get();
        return view('homepage', compact('artworks_ten', 'artworks_four'));
    }
}
