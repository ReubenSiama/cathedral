@extends('layouts.main')
@section('content')
<div class="md:container md:mx-auto mx-5 mt-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">News & Publications</h1>
    <ul>
        @foreach($publications as $publication)
        <li class="mb-4 p-4 bg-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="col-span-1">
                    <img src="{{ asset($publication->image ? 'storage/'.$publication->image : 'images/placeholder.webp') }}" alt="{{ $publication->title }}" class="w-full h-40 object-cover rounded-lg" />
                </div>
                <div class="col-span-3">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ $publication->title }}</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $publication->description }}</p>
                    <a href="{{ route('publications.show', $publication) }}" class="text-blue-700 dark:text-blue-500 hover:underline">Read More</a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    {{ $publications->links() }}
</div>
@endsection
