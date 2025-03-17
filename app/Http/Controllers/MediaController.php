<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMediaRequest;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::all();
        return view('medias', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|string|max:250',
            'description' => 'required|string|max:500',
            'release_year' => 'required|date',
            'type' => 'required|string',
        ],
        [
            'release_year.date' => 'Debe de ser una fecha'
        ]);
        $media = new Media();

        $media-> title = $valid['title'];
        $media-> description = $valid['description'];
        $media-> release_year = $valid['release_year'];
        $media-> type = $valid['type'];

        $media->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        return view('media.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        $media = Media::find($id);
        return view('media.create');
        return view('newmedia', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        $valid = $request->validate([
            'title' => 'required|string|max:250',
            'description' => 'required|string|max:500',
            'release_year' => 'required|date',
            'type' => 'required|string',
        ],
        [
            'release_year.date' => 'Debe de ser una fecha'
        ]);
        $media = new Media();

        $media-> title = $valid['title'];
        $media-> description = $valid['description'];
        $media-> release_year = $valid['release_year'];
        $media-> release_year = $valid['release_year'];
        $media-> type = $valid['type'];

        $media->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        $media = Media::find($id);
        $media->delete();
        return redirect('/media');
    }
}
