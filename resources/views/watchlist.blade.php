@extends('layout')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
        @foreach ($medias as $card)
            <div class="col-span-1">
                <x-mediaCardWatchlist media="{{ $card }}" id="{{ $card->id }}" title="{{ $card->title }}"
                    rating="{{ $card->rating }}" descr="{{ $card->description }}" :platforms="$card->platforms">

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
