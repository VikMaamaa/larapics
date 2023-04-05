<x-layout title="Update Image">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Update Image</div>

                    <div class="card-body">
                        <x-form action="{{ $image->route('update') }}" method="PUT" >

                            <div class="mb-4">
                                <img src="{{ $image->fileUrl()}}" alt="{{$image->title}}" class="image-fluid w-100">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $image->title) }}">
                                @error('title')
                                    <div>{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('images.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </x-form>

                    </div>
                </div>

            </div>
        </div>
    </div>


</x-layout>



{{-- <x-form action="{{ $image->route('update') }}" method="PUT" >

    <div>
        <img src="{{ $image->fileUrl()}}" alt="{{$image->title}}" width="400">
    </div>
    <div>
        <label for="file">File</label>
        <input type="file" name="file" id="file">
        @error('file')
            <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $image->title) }}">
        @error('title')
            <div>{{$message}}</div>
        @enderror
    </div>

    <button type="submit">Update</button>
</x-form> --}}
