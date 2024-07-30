@extends('layouts.main')
@section('content')
<div class="md:container md:mx-auto mx-5 mt-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center">
        {{ $newsInfo->title }}
    </h1>
    @if ($newsInfo->cover_image)
        <img src="{{ asset('storage/'.$newsInfo->cover_image) }}" alt="{{ $newsInfo->title }}" class="h-52 w-52 object-cover float-end">
    @endif
    {!! $newsInfo->description !!}
</div>
@endsection
