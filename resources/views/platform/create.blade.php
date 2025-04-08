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
                            <input type="text" name="name" id="name" placeholder="Añade una plataforma"
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                        </div>
                        <div class="w-full mb-8 mt-8" id="drop-area">
                            <label id="label"
                                class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center justify-center rounded-xl border-2 border-dashed border-indigo-400 p-6 text-center"
                                htmlFor="image">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>

                                <h2 class="mt-4 text-xl font-medium text-gray-400 tracking-wide">Favicon de la Plataforma</h2>
                                <p class="mt-2 text-gray-500 tracking-wide">Sube o arrastra tu archivo PNG, JPG, JPEG o GIF.
                                </p>

                                <input id="image" type="file" class="hidden" name="image"
                                    accept="image/jpeg, image/png, image/jpg, image/gif" />
                            </label>
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md hover:bg-indigo-400 focus:outline-none duration-100 ease-in-out cursor-pointer">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        const dropArea = document.getElementById("drop-area");
        const label = document.getElementById("label")
        const fileInput = document.getElementById("image");

        // Prevenir comportamiento por defecto
        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            label.classList.add("border-solid", "bg-gray-800")
        });

        dropArea.addEventListener("dragleave", () => {
            label.classList.remove("border-solid", "bg-gray-800")
        });

        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            label.classList.remove("border-solid", "bg-gray-800");

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                // Creamos un objeto FileList de manera programática para simular un cambio
                const fileList = new DataTransfer();
                fileList.items.add(files[0]); // Añadimos el archivo al DataTransfer

                // Asignamos el nuevo FileList al input
                fileInput.files = fileList.files;

                // Opcional: para mostrar el nombre del archivo seleccionado
                const fileName = files[0].name;
                dropArea.querySelector("p").textContent = `Archivo seleccionado: ${fileName}`;
            }
        });

        // Opcional: Para mostrar el nombre del archivo seleccionado
        fileInput.addEventListener("change", () => {
            const fileName = fileInput.files[0] ? fileInput.files[0].name : "No se ha seleccionado ningún archivo";
            dropArea.querySelector("p").textContent = `Archivo seleccionado: ${fileName}`;
        });
    </script>
@endsection
