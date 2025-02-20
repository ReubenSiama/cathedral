@extends('layouts.main')
@section('content')
<div class="md:container md:mx-auto mx-5 mt-6">
    <div class="mx-auto w-full md:w-1/2">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{ $spiritualResourceCategory->name }}</h1>
        <ul>
            @foreach($spiritualResources as $spiritualResource)
            <a href="{{ route('spiritual.resources.show', [$spiritualResourceCategory->slug, $spiritualResource]) }}">
                <li class="mb-4 p-4 bg-gray-100">
                    {{ $spiritualResource->title }}
                </li>
            </a>
            @endforeach
        </ul>
        {{ $spiritualResources->links() }}
    </div>
</div>
@endsection
