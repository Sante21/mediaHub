<!-- component -->
<link rel="preconnect" href="https://rsms.me/">
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
<style>
    :root {
        font-family: 'Inter', sans-serif;
    }

    @supports (font-variation-settings: normal) {
        :root {
            font-family: 'Inter var', sans-serif;
        }
    }
</style>

<div class="antialiased bg-black w-full min-h-screen text-slate-300 relative py-4">
    <div class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-7xl my-10 px-2">
        <x-menu>
        </x-menu>

        <x-content>
            <div>
                <!-- component -->
                <div>
                    <div class="header my-3 h-12 px-10 flex items-center justify-between">
                        <h1 class="font-medium text-2xl">All Medias</h1>
                    </div>
                    <div class="flex flex-col mx-3 mt-6 lg:flex-row">
                        <div class="w-full lg:w-1/3 m-1">
                            <form class="w-full bg-black/60 shadow-md p-6 rounded-lg"
                                action="{{ route('media.store') }}" method="post">
                                @csrf
                                @error('release_year')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-full px-3 mb-6">
                                        <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                            htmlFor="media_name">Media Name</label>
                                        <input
                                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                            type="text" name="name" placeholder="Media Name" required />
                                    </div>
                                    <div class="w-full px-3 mb-6">
                                        <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                            htmlFor="media_description">Media Despriction</label>
                                        <textarea textarea rows="4"
                                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                            type="text" name="description" required></textarea>
                                    </div>
                                    <div class="w-full px-3 mb-6">
                                        <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                            for="year">Enter Year</label>
                                        <input
                                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                            type="number" id="year" name="year" min="1950" max="2025"
                                            required placeholder="Enter year">
                                    </div>
                                    <div class="w-full px-3 mb-6">
                                        <label class="block uppercase tracking-wide text-white text-sm font-bold mb-2"
                                            for="platform_select">Select Platform</label>
                                        <select
                                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]"
                                            name="platform" id="platform_select" required>
                                            <option value="">Select a Platform</option>
                                            <option value="platform1">Netflix</option>
                                            <option value="platform2">Amazon</option>
                                            <option value="platform3">Steam</option>
                                            <option value="platform4">Epic Games</option>
                                            <option value="platform5">Disney+</option>
                                        </select>
                                    </div>

                                    <div class="w-full md:w-full px-3 mb-6">
                                        <button
                                            class="appearance-none block w-full bg-green-700 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-green-600 focus:outline-none focus:bg-white focus:border-gray-500">
                                            Add Media</button>
                                    </div>

                                    <div class="w-full px-3 mb-8">
                                        <label
                                            class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center justify-center rounded-xl border-2 border-dashed border-green-400 bg-white p-6 text-center"
                                            htmlFor="dropzone-file">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-800"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                strokeWidth="2">
                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>

                                            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Media
                                                image</h2>

                                            <p class="mt-2 text-gray-500 tracking-wide">Upload or drag & drop your file
                                                SVG, PNG, JPG or GIF. </p>

                                            <input id="dropzone-file" type="file" class="hidden"
                                                name="category_image" accept="image/png, image/jpeg, image/webp" />
                                        </label>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="w-full lg:w-2/3 m-1 bg-white shadow-lg text-lg rounded-sm border border-gray-200">
                            <div class="overflow-x-auto rounded-lg p-3">
                                <table class="table-auto w-full">
                                    <thead class="text-sm font-semibold uppercase text-gray-800 bg-gray-50 mx-auto">
                                        <tr>
                                            <th></th>
                                            <th><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="fill-current w-5 h-5 mx-auto">
                                                    <path
                                                        d="M6 22h12a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2zm7-18 5 5h-5V4zm-4.5 7a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 8.5 11zm.5 5 1.597 1.363L13 13l4 6H7l2-3z">
                                                    </path>
                                                </svg></th>
                                            <th class="p-2">
                                                <div class="font-semibold">Category</div>
                                            </th>
                                            <th class="p-2">
                                                <div class="font-semibold text-left">Description</div>
                                            </th>
                                            <th class="p-2">
                                                <div class="font-semibold text-center">Action</div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="https://images.pexels.com/photos/25652584/pexels-photo-25652584/free-photo-of-elegant-man-wearing-navy-suit.jpeg?auto=compress&cs=tinysrgb&w=400"
                                                    class="h-8 w-8 mx-auto" /></td>
                                            <td>Sample Name</td>
                                            <td>Sample Description</td>
                                            <td class="p-2">
                                                <div class="flex justify-center">
                                                    <a href="#"
                                                        class="rounded-md hover:bg-green-100 text-green-600 p-2 flex justify-between items-center">
                                                        <span>
                                                            <FaEdit class="w-4 h-4 mr-1" />
                                                        </span> Edit
                                                    </a>
                                                    <button
                                                        class="rounded-md hover:bg-red-100 text-red-600 p-2 flex justify-between items-center">
                                                        <span>
                                                            <FaTrash class="w-4 h-4 mr-1" />
                                                        </span> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-content>
    </div>
</div>
