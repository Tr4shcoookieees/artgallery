<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getResource($id)
    {
        return new CategoryResource(Category::findOrFail($id));
    }

    public function getCollection()
    {
        return CategoryResource::collection(Category::all());
    }
}
