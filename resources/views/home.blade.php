@extends('layouts.main')
@section('content')
    @include('layouts.carousel')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 container mx-auto">
        <div class="col-span-2">
            <h1 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Welcome to Christ The King Cathedral</h1>
            <p class="mb-6 text-lg font-normal text-gray-700 dark:text-gray-400">
                Christ the King Cathedral, nestled in the heart of Aizawl, Mizoram, is more than just a place of worship; it's a cultural cornerstone deeply intertwined with the identity of the Mizo people. Since its inception, the cathedral has been a symbol of unity, where generations gather to celebrate their faith and heritage. The vibrant hymns sung within its walls resonate with echoes of Mizo traditions, reflecting the rich tapestry of cultural influences that define the region. From the colorful festivals that spill onto its steps to the quiet moments of prayer shared by families, the cathedral embodies the resilience and spirit of the Mizo community. It serves not only as a spiritual refuge but also as a hub for cultural exchange, where visitors and locals alike come together to celebrate their shared values and traditions. In Christ the King Cathedral, the past, present, and future of Mizoram converge, forming a sacred bond that continues to shape the cultural landscape of the region.
            </p>
        </div>
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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
    <div class="mt-10 bg-black py-10 text-white">
        <div class="container mx-auto">
            <div class="text-center font-extrabold text-xl">Institutions & Others</div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-10 mt-10 text-black">
                @foreach ($institutions as $institution)
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 text-center">
                        {{ $institution->name }}
                        <br>
                        {{ $institution->address }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
