<?php

namespace App\Http\Controllers;

use App\Http\Requests\Artwork\ArtworkStoreRequest;
use App\Models\Artwork;
use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Style;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $artworks = Artwork::with('category', 'author')->filter($request)->paginate(12);

        $categories = Category::get();
        $styles = Style::get();
        $themes = Theme::get();
        $colors = Color::get();
        $materials = Material::get();
        return view('artworks.index', compact('categories', 'styles', 'themes', 'colors', 'materials', 'artworks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtworkStoreRequest $request)
    {
        $condition = [
            'The artwork is in perfect condition',
            'The artwork is in good condition',
            'The artwork is in bad condition',
        ];

        if ($request->validated()) {
            $image = file_get_contents($request->file('image')->getRealPath());

            $image_name = $request->user()->id . '-' . uniqid() . '.' . $request->file('image')->extension();
            if (!Storage::exists('uploads/images/artworks')) {
                Storage::makeDirectory('uploads/images/artworks');
            }
            Storage::put('uploads/images/artworks/' . $image_name, $image);

            $artwork = Artwork::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'theme_id' => $request->theme_id,
                'author_id' => auth()->user()->author->id,
                'price' => $request->price,
                'image' => $image_name,
                'info' => [
                    'tags' => [
                        'is_unique' => 1,
                        'is_signed' => fake()->boolean,
                        'is_certified' => fake()->boolean,
                        'is_framed' => fake()->boolean,
                        'is_sold' => 0,
                    ],
                    'condition' => $condition[rand(0, 2)],
                    'width' => rand(50, 300),
                    'height' => rand(50, 300),
                    'year' => rand(1900, 2023)
                ],
            ]);
            return redirect()->route('artworks.show', $artwork->id)->with('status', 'artwork-stored');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Artwork $artwork)
    {
        return view('artworks.show')->with(['artwork' => $artwork]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artwork $artwork)
    {
        //
    }
}
