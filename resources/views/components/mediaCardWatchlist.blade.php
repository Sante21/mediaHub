<!-- component -->
<style>
    * {
        scrollbar-width: none;
    }

    *::-webkit-scrollbar {
        display: none;
    }
</style>
<div class="flex justify-center items-center">
    <div class="max-w-[720px] mx-auto">
        <!-- Centering wrapper -->
        <div
            class="relative flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
            <div
                class="relative mx-4 mt-4 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
                <img src="https://images.unsplash.com/photo-1499696010180-025ef6e1a8f9?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
                    alt="ui/ux review check" />
                <div
                    class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-tr from-transparent via-transparent to-black/60">
                </div>
                @if (auth()->user()->watchlist && auth()->user()->watchlist->medias->contains($id))
                    <form action="{{ route('watchlist.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-red-600 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none cursor-pointer"
                            type="submit">
                            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </form>
                @else
                    <form action="{{ route('watchlist.add', $id) }}" method="POST">
                        @csrf
                        <button
                            class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-white transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none cursor-pointer"
                            type="submit">
                            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </form>
                @endif
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <h5
                        class="block font-sans text-xl antialiased font-medium leading-snug tracking-normal text-blue-gray-900">
                        {{ $title }}
                    </h5>
                    <p
                        class="flex items-center gap-1.5 font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
                        <a href="{{ route('media.reviews', ['media' => $id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                class="-mt-0.5 h-5 w-5" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </a>
                    </p>
                </div>
                <p
                    class="block font-sans text-base antialiased font-light leading-relaxed text-gray-700 max-w-xs max-h-17 overflow-auto whitespace-normal">
                    {{ $descr }}
                </p>
                <div class="inline-flex flex-wrap items-center gap-3 mt-8 group">
                    @foreach ($platforms as $platform)
                        <span
                            class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-3 text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                            <a href="{{ route('platform.show', $platform->id) }}">
                                <img src="{{ asset($platform->image) }}" alt="{{ $platform->name }}" class="w-5 h-5">
                            </a>
                        </span>
                    @endforeach
                </div>
            </div>
            <div class="p-6 pt-3">
                {{-- <a href="media/{{$id}}/edit"> --}}
                <a href="{{ route('media.edit', $id) }}">
                    <button
                        class="block w-full select-none rounded-lg bg-gray-900 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none cursor-pointer"
                        type="button">
                        Edit
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
