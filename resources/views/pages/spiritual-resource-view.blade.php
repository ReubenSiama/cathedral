@extends('layouts.main')
@section('content')
<div class="md:container md:mx-auto mx-5 mt-6">
    <div class="mx-auto w-full md:w-1/2">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{ $spiritualResource->title }}</h1>
        <div class="mb-4 p-4 bg-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="col-span-3">
                    <p class="text-gray-700 dark:text-gray-300">{!! $spiritualResource->content !!}</p>
                </div>
            </div>
        </div>
        @if ($spiritualResource->url)
            <div class="mb-4 p-4 bg-gray-100">
                <a href="{{ $spiritualResource->url }}" class="text-blue-700 dark:text-blue-500 hover:underline">
                    View Resource
                </a>
            </div>
        @endif
        @if ($spiritualResource->attachments)
            <div class="mt-4">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Attachments</h2>
                <ul>
                    @foreach ($spiritualResource->attachments as $attachment)
                        <li>
                            <a href="{{ asset('storage/'.$attachment->file) }}" class="text-blue-500 hover:text-blue-700">
                                {{ 'View '.$spiritualResource->title.'\'s attachment '.$loop->index + 1 }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
