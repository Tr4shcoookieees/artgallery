<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\ArtworkStyle;
use App\Models\Category;
use App\Models\Style;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $artworks = Artwork::filter($request)->with('category')->orderByDesc('created_at')->paginate(12);

        $categories = Category::get();
        $styles = Style::get();
        return view('pages.catalog', compact('categories', 'styles', 'artworks'));
    }
}
