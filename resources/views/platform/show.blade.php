@extends('layout')

@section('content')
    <div class="platform-container">
        <h2 class="text-white text-2xl font-bold">Plataforma: {{ $platform->name }}</h2>
        <div class="medias-list">
            @foreach ($medias as $media)
                <a href="{{ route('media.show', $media->id) }}">
                    <x-platformCard mediaName="{{ $media->title }}" mediaId="{{ $media->id }}">
                    </x-platformCard>
                </a>
            @endforeach
        </div>
    </div>
@endsection
