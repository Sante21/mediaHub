<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="bg-black/60 p-6 rounded-lg flex-none w-60">
    <div class="flex flex-row space-x-4 items-center">
        {{-- <a href="{{ route('platform.show', $id) }}"> --}}
        <div id="stats-1">
            <a href="{{ route('platform.show', $mediaId) }}">
                <img src="{{ asset('images/' . $mediaName . '.png') }}" alt="Favicon {{ $mediaName }}"
                    class="w-10 h-10 bg-slate-50 rounded-md p-1" rounded-full>
            </a>
        </div>
        {{-- </a> --}}
        <div class="flex flex-row gap-2">
            <p class="text-indigo-300 text-xl font-medium uppercase leading-4">{{ $mediaName }}</p>

            <div class="flex gap-2">
                @can('editPlatform')
                    <a href="/platform/{{ $mediaId }}/edit">
                        <i class="fa-solid fa-pen-to-square text-white"></i>
                    </a>
                @endcan
                @can('deletePlatform')
                    <form action="{{ route('platform.destroy', $mediaId) }}" method="POST">
                        @csrf
                        @method('DELETE') <!-- Esto simula un método DELETE -->
                        <button type="submit" class="cursor-pointer">
                            <i class="fa-solid fa-trash text-white"></i>
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</div>
