<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($mediaId)
    {
        // Obtener el medio por su ID
        $media = Media::findOrFail($mediaId);

        // Obtener las reseñas de ese medio
        $reviews = $media->reviews; // O también puedes usar ->with('reviews') si estás haciendo una consulta más compleja

        // Pasar los datos a la vista
        return view('review.show', compact('media', 'reviews'));
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
    public function store(Request $request, $mediaId)
    {
        // Validación de los datos del formulario
        $valid = $request->validate([
            'comment' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        // dd($valid);
        $media = Media::findOrFail($mediaId);


        $review = new Review();
        $review->comment = $valid['comment'];
        $review->rating = $valid['rating'];
        $review->user_id = auth()->id();
        $review->media_id = $media->id;

        // Guardar la reseña en la base de datos
        $review->save();

        // Redirigir al usuario a la página del medio con un mensaje de éxito
        return redirect()->route('media.reviews', ['media' => $media->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect()->route('media.create');
    }
}
