<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Platform;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMediaRequest;
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
        // $medias = Media::all();
        $medias = Media::paginate(15);
        $platforms = Platform::all();
        $categories = Category::all();
        return view('media.create', compact('medias', 'platforms', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|string|max:75',
            'description' => 'required|string|max:500',
            'release_year' => 'required|integer|between:1950,2025',
            'type' => 'required|string|in:movie,series,game',
        ], [
            'title.required' => 'El campo título es obligatorio.',
            'description.required' => 'El campo descripción es obligatorio.',
            'release_year.required' => 'El campo año de lanzamiento es obligatorio.',
            'type.required' => 'El campo tipo es obligatorio.',
        ]);

        $media = Media::create($valid);

		// Adjuntar plataformas
		$platformsIds = $request->input('platforms', []); // ['1', '2', ...]
		$media->platforms()->attach($platformsIds);

        // Adjuntar plataformas
		$categoriesIds = $request->input('categories', []); // ['1', '2', ...]
		$media->categories()->attach($categoriesIds);

		return redirect()->route('media.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        $platforms = Platform::all();
        $categories = Category::all();
        return view('media.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $platforms = Platform::all();
        $categories = Category::all();
        $media = Media::findOrFail($id);

        return view('media.edit', compact('media', 'platforms', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $medium)
    {
        // dd($request->all());
        $valid = $request->validate([
            'title' => 'required|string|max:75',
            'description' => 'required|string|max:500',
            'release_year' => 'required|integer|between:1950,2025',
            'type' => 'required|string|in:movie,series,game',
            'platforms' => 'required|array',  // Asegúrate de que 'platforms' sea un array
            'platforms.*' => 'exists:platforms,id',
            'categories' => 'required|array',  // Asegúrate de que 'categories' sea un array
            'categories.*' => 'exists:categories,id',
        ], [
            'title.required' => 'El campo título es obligatorio.',
            'description.required' => 'El campo descripción es obligatorio.',
            'release_year.required' => 'El campo año de lanzamiento es obligatorio.',
            'type.required' => 'El campo tipo es obligatorio.',
            'platforms.required' => 'Debes seleccionar al menos una plataforma.',
            'categories.required' => 'Debes seleccionar al menos una categoría.',
        ]);

        // dd($valid);

        $medium->title = $valid['title'];
        $medium->description = $valid['description'];
        $medium->release_year = $valid['release_year'];
        $medium->type = $valid['type'];

        $medium->save();

        // $platformsIds = $request->input('platforms', []);

        $platformsIds = $valid['platforms'];
		$medium->platforms()->sync($platformsIds);

        $categoriesIds = $valid['categories'];
		$medium->categories()->sync($categoriesIds);

        return redirect()->route('media.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect()->route('media.create');
    }
}
