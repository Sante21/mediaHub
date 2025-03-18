
<form action="{{ route('media.update') }}" method="post">
    @csrf
    @error('release_year')
        <div>
            {{ $message }}
        </div>
    @enderror
    <input type="text" name="title" id="title" value="{{$media->title}}">
    <textarea name="description" cols="30" rows="10" value="{{$media->description}}"></textarea>
    <input type="date" name="release_year" value="{{$media->release_year}}" >
    {{-- <input type="text" name="release_year" id="release_year"> --}}
    <input type="text" name="type" value="{{$media->type}}">
    <button type="submit">Enviar</button>
</form>
