<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platforms = Platform::all();
        return view('platforms', compact('platforms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('platform.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
        ]);

        Platform::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('platform.index'); // Redirigir de nuevo a la vista principal
    }

    /**
     * Display the specified resource.
     */
    public function show(Platform $platform)
    {
        $medias = $platform->medias;

        return view('platform.show', compact('platform', 'medias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $platform = Platform::findOrFail($id);
        return view('platform.edit', compact('platform'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlatformRequest $request, Platform $platform)
    {
        $valid = $request->validate([
            'name' => 'required|string|max:100',
        ], [
            'name.required' => 'El campo name es obligatorio.',
        ]);

        $platform->name = $valid['name'];
        $platform->save();

        return redirect()->route('platform.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();
        return redirect()->route('platform.index');
    }
}
