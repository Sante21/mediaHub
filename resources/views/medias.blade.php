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
            <button><a href="media/create">Crear una nueva media</a></button>
            @foreach ($medias as $card)
                <x-mediaCard id="{{$card->id}}" title="{{$card->title}}" descr="{{$card->description}}">
                </x-mediaCard>
                {{-- <h1>{{$card->type}}</h1> --}}
            @endforeach
            {{-- <x-media>
            </x-media> --}}
        </x-content>
    </div>
</div>
