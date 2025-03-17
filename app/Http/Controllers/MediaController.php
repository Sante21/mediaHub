<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allMedia = Media::class->get();
        return view('viewMedia');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newtask');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMediaRequest $request)
    {
        $media = new Media();

        $media-> title = $r->input('title');
        $media-> description = $r->input('description');
        $media-> completed = false;
        $media-> date = $r->input('due_date');
        $media-> asignto = $r->input('asignto');
        $media-> priority = $r->input('priority');

        $media->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        $task = Task::find($id);
        return view('newtask', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMediaRequest $request, Media $media)
    {
        $task = Task::find($id);

        $task-> title = $r->input('title');
        $task-> description = $r->input('description');
        $task-> completed = false;
        $task-> date = $r->input('due_date');
        $task-> asignto = $r->input('asignto');
        $task-> priority = $r->input('priority');

        $task->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/');
    }
}
