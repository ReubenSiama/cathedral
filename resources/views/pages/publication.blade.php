@extends('layouts.main')
@section('content')
<div class="md:container md:mx-auto mx-5 mt-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center">
        {{ $newsInfo->title }}
    </h1>
    @if ($newsInfo->cover_image)
        <img src="{{ asset('storage/'.$newsInfo->cover_image) }}" alt="{{ $newsInfo->title }}" class="h-52 w-52 object-cover float-end">
    @endif
    <br>
    {!! $newsInfo->content !!}

    @if ($newsInfo->attachments)
        <div class="mt-4">
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Attachments</h2>
            <ul>
                @foreach ($newsInfo->attachments as $attachment)
                    <li>
                        <a href="{{ asset('storage/'.$attachment->file) }}" class="text-blue-500 hover:text-blue-700">
                            {{ $attachment->name ?? 'Download' }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        
    @endif
</div>
@endsection
