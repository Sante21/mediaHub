@extends('layout')

@section('content')
    {{-- <x-inicio>
    </x-inicio> --}}

    <div id="24h">
        <div id="platforms">
            <h1 class="font-bold py-4 uppercase">All the Platforms</h1>
            <div id="stats" class="flex space-x-6 overflow-x-auto p-4">
                @foreach ($platforms->unique('name') as $platform)
                    <a href="{{ route('platform.show', $platform->id) }}">
                        <x-platformCard name='{{ $platform->name }}' id="{{ $platform->id }}" image="{{ $platform->image }}">
                        </x-platformCard>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div id="last-4-medias" class="mt-5">
        <h1 class="font-bold py-4 uppercase">Last 4 Medias</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
            @foreach ($medias->take(4) as $card)
                <div class="col-span-1">
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
                </div>
            @endforeach
        </div>
    </div>
    <div id="last-users" class="mt-10">
        <h1 class="font-bold py-4 uppercase">Last 3 Users</h1>
        <div class="overflow-x-scroll">
            <table class="w-full whitespace-nowrap text-slate-100">
                <thead class="bg-black/60 text-white">
                    <th class="text-left py-3 px-2 rounded-l-lg">Name</th>
                    <th class="text-left py-3 px-2">Email</th>
                    <th class="text-left py-3 px-2">Group</th>
                    <th class="text-left py-3 px-2">Status</th>
                    <th class="text-left py-3 px-2 rounded-r-lg">Actions</th>
                </thead>
                @foreach ($users->take(3) as $user)
                    <tr class="border-b border-gray-700">
                        <td class="py-3 px-2 font-bold">
                            <div class="inline-flex space-x-3 items-center">
                                <span><img class="rounded-full w-8 h-8"
                                        src="https://images.generated.photos/tGiLEDiAbS6NdHAXAjCfpKoW05x2nq70NGmxjxzT5aU/rs:fit:256:256/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LnBob3Rvcy92M18w/OTM4ODM1LmpwZw.jpg"
                                        alt=""></span>
                                <span>{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-2">{{ $user->email }}</td>
                        <td class="py-3 px-2">User</td>
                        <td class="py-3 px-2">Approved</td>
                        <td class="py-3 px-2">
                            <div class="inline-flex items-center space-x-3">
                                <a href="" title="Edit" class="hover:text-white"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE') <!-- Esto simula un método DELETE -->
                                    <button type="submit" class="cursor-pointer align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
