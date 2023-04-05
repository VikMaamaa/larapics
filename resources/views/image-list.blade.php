<x-layout title="Discover free images">

    <div class="container-fluid mt-4">
        @if ($message = session('message'))
            <x-alert type="success" dismissible>
                    {{ $component->icon()}}
                    {{ $message}}
            </x-alert>
        @endif

        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach ($images as $image)

            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card">
                    <a href="{{ $image->permalink() }}">
                        <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}"  class="card-img-top">
                    </a>

                    {{-- Auth::check() && Auth::user()->can('update', $image) --}}



                </div>
            </div>
            @endforeach
        </div>

       {{$images->links()}}
    </div>


{{-- <a href="{{ route('images.create')}}">Upload Image</a> --}}





</x-layout>
