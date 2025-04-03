@extends('layout')

@section('content')
    @role('admin')
        <button><a href="media/create">Añadir una nueva media</a></button>
    @endrole
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
        @foreach ($medias as $card)
            <div class="col-span-1">
                <x-mediaCardWatchlist media="{{ $card }}" id="{{ $card->id }}" title="{{ $card->title }}"
                    rating="{{ $card->raring }}" descr="{{ $card->description }}" :platforms="$card->platforms">
                    {{-- platforms="{{ $card->platforms }}" --}}
                    <x-slot name="platform">
                        @foreach ($card->platforms as $platform)
                            {{ $platform->name }}
                        @endforeach
                    </x-slot>
                    <x-slot name="category">
                        @foreach ($card->categories as $category)
                            {{ $category->name }}
                        @endforeach
                    </x-slot>
                </x-mediaCardWatchlist>
            </div>
        @endforeach
    </div>
@endsection
