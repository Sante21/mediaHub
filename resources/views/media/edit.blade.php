@extends('layout')

@section('content')
    <div>
        <!-- component -->
        <div>
            <div class="header my-3 h-12 px-10 flex items-center justify-between">
                <h1 class="font-medium text-2xl">All Medias</h1>
            </div>
            <div class="flex flex-col mx-3 mt-6 lg:flex-row">
                <div class="w-full lg:w-1/3 m-1">
                    <form class="w-full bg-black/60 shadow-md p-6 rounded-lg" action="{{ route('media.update', $media->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                    htmlFor="media_name">Media Name</label>
                                <input
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                    type="text" name="title" placeholder="Media Name"
                                    value="{{ old('title', $media->title) }}" required />
                            </div>

                            <div class="w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                    htmlFor="media_description">Media Description</label>
                                <textarea rows="4"
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                    type="text" name="description" required>{{ old('description', $media->description) }}</textarea>
                            </div>

                            <div class="w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                    for="release_year">Enter Release Year</label>
                                <input
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                    type="number" id="release_year" name="release_year" min="1950" max="2025"
                                    value="{{ old('release_year', $media->release_year) }}" required
                                    placeholder="Enter year">
                            </div>

                            <div class="w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                    for="type">Select the Type</label>
                                <select
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                    name="type" id="type" required>
                                    <option value="">Select the type</option>
                                    <option value="movie" @if ($media->type == 'movie') selected @endif>Movie</option>
                                    <option value="series" @if ($media->type == 'series') selected @endif>Series</option>
                                    <option value="game" @if ($media->type == 'game') selected @endif>Game</option>
                                </select>
                            </div>
                            <div class="w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                    for="categories">Select the Category</label>
                                <select
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                    name="categories[]" id="categories" required>

                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($media->categories->contains($category->id)) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                    for="platforms">Select Platform</label>
                                <select
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                    name="platforms[]" id="platforms" required multiple>

                                    <option value="">Select a Platform</option>
                                    @foreach ($platforms->unique('name') as $platform)
                                        <option value="{{ $platform->id }}"
                                            @if ($media->platforms->contains($platform->id)) selected @endif>{{ $platform->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full md:w-full px-3 mb-6">
                                <button type="submit"
                                    class="appearance-none block w-full bg-green-700 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-green-600 focus:outline-none focus:bg-white focus:text-green-600 focus:border-green-800">
                                    Save Media
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="w-full lg:w-2/3 m-1 bg-black/60 shadow-lg text-lg rounded-sm">
                    <div class="overflow-x-auto rounded-lg p-3">
                        <table class="table-auto w-full">
                            <thead class="text-sm font-semibold uppercase text-gray-800 bg-black/60 mx-auto">
                                <tr class="border border-b-white border-black/60">
                                    <th></th>
                                    <th><svg xmlns="http://www.w3.org/2000/svg"
                                            class="fill-current w-5 h-5 mx-auto text-white">
                                            <path
                                                d="M6 22h12a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2zm7-18 5 5h-5V4zm-4.5 7a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 8.5 11zm.5 5 1.597 1.363L13 13l4 6H7l2-3z">
                                            </path>
                                        </svg></th>
                                    <th class="p-2">
                                        <div class="font-semibold text-white">Media</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left text-white">Type</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center text-white">Action</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-white">{{ $media->id }}</td>
                                    <td><img src="https://images.pexels.com/photos/25652584/pexels-photo-25652584/free-photo-of-elegant-man-wearing-navy-suit.jpeg?auto=compress&cs=tinysrgb&w=400"
                                            class="h-8 w-8 mx-auto" /></td>
                                    {{-- <td class="text-white">{{ $media->title }}</td> --}}
                                    <td class="text-white text-center">{{ \Str::limit($media->title, 15) }}
                                    </td>

                                    <td class="text-white">{{ $media->type }}</td>
                                    <td class="p-2">
                                        <div class="flex justify-center">
                                            <a href="#"
                                                class="rounded-md hover:bg-green-100 text-green-600 p-2 flex justify-between items-center">
                                                <span>
                                                    <FaEdit class="w-4 h-4 mr-1" />
                                                </span> Edit
                                            </a>
                                            <form action="{{ route('media.destroy', $media->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE') <!-- Esto simula un método DELETE -->
                                                <button type="submit"
                                                    class="rounded-md hover:bg-red-100 text-red-600 p-2 flex justify-between items-center cursor-pointer">
                                                    <span>
                                                        <FaTrash class="w-4 h-4 mr-1" />
                                                    </span> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- {{ $media->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
