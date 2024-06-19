@extends('layouts.main')
@section('content')
<div class="md:container mx-4 md:mx-auto mt-6">
    <h1 class="text-center mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
        {{ $about->name }}
    </h1>
    <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->name }}"
            class="object-cover w-full md:w-[30%] ml-6 rounded-lg md:float-end">
    {!! $about->value !!}
</div>
@endsection
