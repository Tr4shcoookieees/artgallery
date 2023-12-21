<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Author::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request, Author $author)
    {
        $author->fill($request->validated());
        $author->user_id = $request->user()->id;

        $author->save();

        return redirect()->route('profile.edit')->with('status', 'author-stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, string $id)
    {
        Author::find($id)->update($request->validated());

        return redirect()->route('profile.edit')->with('status', 'author-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $request->validateWithBag('profileDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        $user->author->delete();

        return redirect()->route('profile.edit')->with('status', 'author-deleted');
    }
}
