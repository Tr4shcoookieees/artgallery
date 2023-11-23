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
        $author = 'John Doe';
        return view('pages.homepage')->with('author', $author);
    }
}
