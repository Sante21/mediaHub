@extends('layout')

@section('content')
    @can('createPlatform')
        <button><a href="platform/create">Crear una nueva plataforma</a></button>
    @endcan
    <div id="platforms">
        <h1 class="font-bold py-4 uppercase">All the Platforms</h1>
        <div id="stats" class="flex space-x-6 overflow-x-auto p-4">
            @foreach ($platforms->unique('name') as $platform)
            {{-- {{$platform->image}} --}}
                {{-- <a href="{{ route('platform.show', $platform->id) }}"> --}}
                <x-platformCard name='{{ $platform->name }}' id="{{ $platform->id }}" image="{{$platform->image}}">
                </x-platformCard>
                {{-- </a> --}}
            @endforeach
        </div>
    </div>
@endsection
