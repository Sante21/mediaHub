@extends('layout')

@section('content')
    @can('createPlatform')
        <button><a href="platform/create">Crear una nueva plataforma</a></button>
    @endcan
    <div id="platforms">
        <h1 class="font-bold py-4 uppercase">All the Platforms</h1>
        <div id="stats" class="flex space-x-6 overflow-x-auto p-4">
            @foreach ($platforms->unique('name') as $platform)
                <x-platformCard name='{{ $platform->name }}' id="{{ $platform->id }}" image="{{ $platform->image }}">
                </x-platformCard>
            @endforeach
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 mt-3">
            @foreach ($medias as $card)
                <div class="col-span-1">
                    <x-mediaCard media="{{ $card }}" id="{{ $card->id }}" title="{{ $card->title }}"
                        rating="{{ $card->raring }}" descr="{{ $card->description }}" :platforms="$card->platforms">
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
                    </x-mediaCard>
                </div>
            @endforeach
        </div>
    </div>
@endsection
