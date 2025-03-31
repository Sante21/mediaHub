<?php

namespace App\Http\Controllers;

use App\Models\Media;
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
        // $medias = Media::with(['platforms', 'reviews'])
        // ->withAvg('reviews', 'rating') // Calcula el promedio de rating por cada media
        // ->get();
        // return $medias;
        return view('medias', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medias = Media::all();
        return view('media.create', compact('medias'));
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
            /*'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120', // Validación de la imagen*/
        ],
        [
            'release_year.date' => 'Debe de ser una fecha'
        ]);
        // $media = new Media();

        // $media-> title = $valid['title'];
        // $media-> description = $valid['description'];
        // $media-> release_year = $valid['release_year'];
        // $media-> type = $valid['type'];

        // $media->save();

        // Manejo de la imagen
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('images', 'public'); // Guardar la imagen en el almacenamiento público
            $valid['image'] = $imagePath; // Asignar la ruta de la imagen al arreglo de validación
        }

        Media::create($valid);

        return redirect('/media');
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
        // var_dump( $media);
        $media = Media::find($media->id);
        return view('media.edit', compact('media'));
        // return view('newmedia', compact('media'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Validación de la imagen
        ],
        [
            'release_year.date' => 'Debe de ser una fecha'
        ]);
        $media = new Media();

        $media-> title = $valid['title'];
        $media-> description = $valid['description'];
        $media-> release_year = $valid['release_year'];
        $media-> type = $valid['type'];
        $media-> image = $valid['image'];

        $media->save();
        return redirect('/media');

        Media::update($valid);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = Media::find($id);
        $media->delete();
        return redirect('/media');
    }
}
