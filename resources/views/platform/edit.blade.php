<!-- component -->
@extends('layout')

@section('content')
    <body>
        <div class="flex justify-center items-center min-h-screen antialiased">
            <div class="container sm:mt-40 mt-24 my-auto max-w-md border-2 border-indigo-400 rounded-[20px] p-3 bg-gray-800">
                <!-- header -->
                <div class="text-center m-6">
                    <h1 class="text-3xl font-semibold text-gray-100">¿Quieres añadir una nueva plataforma?</h1>
                </div>
                <!-- sign-in -->
                <div class="m-6">
                    <form class="mb-4" action="{{ route('platform.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="name"
                                class="block mb-2 text-sm text-gray-100 dark:text-gray-400">Plataforma</label>
                            <input type="text" name="name" id="name" value="{{$platform->name}}" placeholder="Añade una plataforma"
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="w-full px-3 py-4 text-white bg-indigo-400 rounded-md hover:bg-indigo-400 focus:outline-none duration-100 ease-in-out cursor-pointer">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
