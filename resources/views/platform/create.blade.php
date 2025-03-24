<form action="{{ route('platform.store') }}" method="post">
    @csrf
    @error('release_year')
        <div>
            {{ $message }}
        </div>
    @enderror
    <input type="text" name="title" id="title">
    <textarea name="description" cols="30" rows="10"></textarea>
    <input type="date" name="release_year">
    {{-- <input type="text" name="release_year" id="release_year"> --}}
    <input type="text" name="type">
    <button type="submit">Enviar</button>
</form>
