@extends('layout')

@section('content')
    <!-- component -->
    <div>
        <section class="rounded-b-lg  mt-4 ">
            {{-- <form action="/" accept-charset="UTF-8" method="post"><input type="hidden"> --}}
            <form class="w-full bg-black/60 shadow-md p-6 rounded-lg" action="{{ route('review.store', ['media' => $media->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <textarea class="w-full shadow-inner p-4 border-1 mb-4 rounded-lg focus:shadow-outline text-2xl border-zinc-50"
                    placeholder="Escribe tu reseña..." cols="6" rows="6" id="comment" name="comment" spellcheck="false"></textarea>
                <div>
                    <label for="rating">Calificación</label>
                    <input class="bg-white rounded-sm text-black/60" type="number" id="rating" name="rating"
                        min="1" max="10" required>
                </div>
                <button type="submit"
                    class="font-bold py-2 px-4 mt-6 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg cursor-pointer">Enviar
                    review
                </button>
            </form>

            <div id="task-comments" class="pt-4">
                <!--     comment-->
                @foreach ($reviews as $review)
                    <div
                        class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                        <div class="flex flex-row justify-center mr-2">
                            <img alt="avatar" width="48" height="48"
                                class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4"
                                src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
                            <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">
                                {{ $review->user->name }}</h3>
                        </div>
                        <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left "> {{ $review->comment }}
                        </p>
                        <p style="width: 50%" class="text-gray-900 text-lg text-center md:text-left ">Calificación: {{ $review->rating }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
