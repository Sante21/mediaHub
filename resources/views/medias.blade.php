@extends('layout')

@section('content')
    @role('admin')
        <button><a href="media/create">Crear una nueva media</a></button>
    @endrole
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
        @foreach ($medias as $card)
            <div class="col-span-1">
                <x-mediaCard media="{{ $card }}" id="{{ $card->id }}" title="{{ $card->title }}"
                    rating="{{ $card->raring }}" descr="{{ $card->description }}">
                    <x-slot name="platform">
                        @foreach ($card->platforms as $platform)
                            <li>{{ $platform->name }}</li>
                        @endforeach
                    </x-slot>
                    <x-slot name="category">
                        @foreach ($card->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </x-slot>
                </x-mediaCard>
            </div>
        @endforeach
    </div>
@endsection
