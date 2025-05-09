<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="bg-black/60 p-6 rounded-lg flex-none w-70">
    <div class="flex flex-row space-x-4 items-center">
        <div id="stats-1">
            <a href="{{ route('platform.show', $id) }}">
                <img src="{{ asset($image) }}" alt="Favicon {{ $name }}"
                    class="w-10 h-10 bg-slate-50 rounded-md p-1" rounded-full>
            </a>
        </div>
        <div class="flex flex-row gap-2">
            <a href="{{ route('platform.show', $id) }}">
                <p class="text-indigo-300 text-xl font-medium uppercase leading-4">{{ $name }}</p>
            </a>

            <div class="flex gap-2">
                @can('editPlatform')
                    <a href="/platform/{{ $id }}/edit">
                        <i class="fa-solid fa-pen-to-square text-white"></i>
                    </a>
                @endcan
                @can('deletePlatform')
                    <form action="{{ route('platform.destroy', $id) }}" method="POST">
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
