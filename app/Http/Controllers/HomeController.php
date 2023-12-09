<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $artworks_ten = App\Models\Artwork::inRandomOrder()->limit(10)->get()->chunk(5);
        $artworks_four = App\Models\Artwork::inRandomOrder()->limit(4)->get();
        return view('pages.homepage', compact('artworks_ten', 'artworks_four'));
    }
}
