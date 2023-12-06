<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use App\Models\Color;
use App\Models\Style;
use App\Models\Theme;
use Illuminate\Http\Request;


class CatalogController extends Controller
{
    public function __invoke(Request $request)
    {
        $artworks = Artwork::filter($request)->with('category')->orderByDesc('created_at')->paginate(12);

        $categories = Category::get();
        $styles = Style::get();
        $themes = Theme::get();
        $colors = Color::get();
        return view('pages.catalog', compact('categories', 'styles', 'themes', 'colors', 'artworks'));
    }
}
