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
        $monthly = App\Models\Artwork::inRandomOrder()->limit(5)->get();
        $artTwo = App\Models\Artwork::inRandomOrder()->limit(4)->get();
        $artThree = App\Models\Artwork::inRandomOrder()->limit(5)->get();
        return view('pages.homepage', compact('monthly', 'artTwo', 'artThree'));
    }
}
