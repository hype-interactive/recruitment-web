<form action="{{ route('test') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- <input type="email" name="email" /> --}}
    <input type="submit" value="Submit" />
</form>