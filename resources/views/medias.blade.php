@extends('layout')

@section('content')
    @can('createMedia')
        <button><a href="media/create">Crear una nueva media</a></button>
    @endcan
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
        @foreach ($medias as $card)
            <div class="col-span-1">
                @can('seeMedia')
                    <x-mediaCard media="{{ $card }}" id="{{ $card->id }}" title="{{ $card->title }}"
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
                    </x-mediaCard>
                @endcan
            </div>
        @endforeach
    </div>
@endsection
