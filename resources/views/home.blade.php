@extends('layouts.main')
@section('content')
    <x-carousel :image="$banner->image"/>
    @if ($newsInfo->count() > 0)
        <div class="wrapper bg-[#22242A] text-white">
            <div class="marquee">
                <div class="marquee__group">
                    @foreach ($newsInfo as $news)
                        <a class="marquee__item hover:text-gray-300" href="{{ route('news.show', $news) }}">{{ $news->title }}</a>
                    @endforeach
                </div>
                <div aria-hidden="true" class="marquee__group">
                    @foreach ($newsInfo as $news)
                        <a class="marquee__item" href="{{ route('news.show', $news) }}">{{ $news->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-10 gap-5 mt-10 md:container mx-4 md:mx-auto">
        <div class="col-span-2">
            <h1 class="text-center md:text-left mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $about->name }}</h1>
            <div class="mb-5">
                {!! $about->description !!}
            </div>
            <div class="">
                <a class="py-3 px-4 bg-[#41C190] text-white rounded-lg" href="{{ route('about.us')}}">Read More</a>
            </div>
        </div>
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#" class="text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Mass Timings</h5>
            </a>
            <table class="mb-3 font-normal text-gray-700 dark:text-gray-400 w-full">
                <thead>
                    <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <th class="text-left p-2">Days</th>
                        <th>English</th>
                        <th>Mizo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($massTimings as $timing)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="p-2">{{ $timing->days }}</td>
                            <td class="w-24 text-center">{{ $timing->english_time }}</td>
                            <td class="w-24 text-center">{{ $timing->mizo_time }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-10 bg-[#22242A] py-10 text-white">
        <div class="mx-4 md:container md:mx-auto">
            <div class="text-center font-extrabold text-xl mb-10">Institutions</div>
            <a href="{{ route('institutions') }}">
                <livewire:info-card :items="$institutions"/>
            </a>
        </div>
    </div>
    <div class="mt-10 md:container md:mx-auto mx-4">
        <h1 class="uppercase text-center text-2xl font-extrabold">{{ $stationsIntro->name }}</h1>
        <p class="text-center font-extralight">
            {{ $stationsIntro->description }}
        </p>
        <x-station-container :stations="$stations"/>
    </div>
@endsection
