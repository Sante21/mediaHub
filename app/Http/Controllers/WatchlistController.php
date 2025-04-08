<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\Media;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreWatchlistRequest;
use App\Http\Requests\UpdateWatchlistRequest;

class WatchlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $watchlist = auth()->user()->watchlist;

        $medias = $watchlist->medias()->with(['platforms', 'categories', 'reviews'])->get();

        return view('watchlist', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $platforms = Platform::all();
        $medias = Media::paginate(15);
        $categories = Category::all();
        return view('watchlist.create', compact('medias', 'platforms', 'categories'));
    }

    // public function addToWatchlist(Media $media)
    // {
    //     $watchlist = auth()->user()->watchlist;
    //     $watchlist->medias()->attach($media->id);
    //     return view('watchlist-index', compact('media', 'watchlist'));
    //     // return back()->with('success', 'Añadido a la watchlist');
    // }

    public function addToWatchlist(Media $media)
    {
        $user = auth()->user();
        $medias = Media::all();

        // Si el usuario no tiene una watchlist, la creamos
        if (!$user->watchlist) {
            $user->watchlist()->create(); // Esto asume que tienes una relación hasOne()
        }

        $watchlist = $user->watchlist;

        // Solo se añade si no está ya
        if (!$watchlist->medias->contains($media->id)) {
            $watchlist->medias()->attach($media->id);
        }
        return redirect()->route('watchlist.index', compact('medias', 'watchlist'));
    }

    public function remove(Media $media)
    {
        $watchlist = Auth::user()->watchlist;

        if ($watchlist->medias->contains($media->id)) {
            // dd($watchlist->medias->contains($media->id));
            $watchlist->medias()->detach($media->id);
        }

        return back();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Watchlist $watchlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Watchlist $watchlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Watchlist $watchlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        $watchlist = Auth::user()->watchlist;

        if ($watchlist->medias->contains($media->id)) {
            // dd($watchlist->medias->contains($media->id));
            $watchlist->medias()->detach($media->id);
        }

        return back();
    }
}
