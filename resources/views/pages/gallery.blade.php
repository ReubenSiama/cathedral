@extends('layouts.main')
@section('carousel')
    <section class="bg-gray-200 dark:bg-gray-900 mb-10">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Gallery</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Every photo tells a story; our gallery whispers a thousand tales.</p>
        </div>
    </section>
@endsection
@section('content')
    <div class="md:container md:mx-auto mx-5">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach ($galleries as $gallery)
                <img
                class="rounded shadow-lg hover:scale-125 ease-in-out duration-500 transform hover:shadow-2xl transition
                cursor-pointer hover:z-50"
                src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}">
            @endforeach
        </div>
    </div>
@endsection
