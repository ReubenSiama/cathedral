@extends('layouts.main')
@section('content')
<div class="md:container md:mx-auto mx-5 mt-6">
    <h1 class="text-center mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
        BISHOPS
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($bishops as $bishop)
            <div
            class="bg-white border border-gray-200
            rounded-lg shadow
            dark:bg-gray-800
            dark:border-gray-700
            text-center
            ">
                <div class="w-full h-72 object-cover rounded-lg">
                    <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset($bishop->image ? 'storage/'.$bishop->image : 'images/placeholder.webp') }}" alt="{{ $bishop->name }}" />
                </div>
                <div class="p-5">
                    <h5 class="mb-2 uppercase font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $bishop->name }}
                        <br>
                        {{ $bishop->description }}
                    </h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {!! $bishop->bio !!}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="bg-[#22242A] text-white py-10 mt-10">
    <div class="md:container md:mx-auto mx-5">
        <h1 class="text-center mb-2 text-xl font-bold tracking-tight">
            PRIESTS
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-4">
            @foreach ($parishPriests as $parishPriest)
                <div
                class="bg-white border border-gray-200
                rounded-lg shadow
                dark:bg-gray-800
                dark:border-gray-700
                text-center
                ">
                    <div class="w-full h-60 object-cover rounded-lg">
                        <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset($parishPriest->image ? 'storage/'.$parishPriest->image : 'images/placeholder.webp') }}" alt="{{ $parishPriest->name }}" />
                    </div>
                    <div class="p-5 text-gray-900">
                        <h5 class="mb-2 uppercase font-bold tracking-tight">
                            {{ $parishPriest->name }}
                        </h5>
                        <p>
                            {{ date('M Y', strtotime($parishPriest->from)) }} -
                            {{ $parishPriest->to ? date('M Y', strtotime($parishPriest->to)) : 'Till Date'}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="md:container md:mx-auto mx-5 py-10">
    <h1 class="text-center mb-2 text-xl font-bold tracking-tight">
        ASSISTANT PARISH PRIESTS
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-4">
        @foreach ($assistantParishPriests as $assistant)
            <div
            class="bg-white border border-gray-200
            rounded-lg shadow
            dark:bg-gray-800
            dark:border-gray-700
            text-center
            ">
                <div class="w-full h-60 object-cover rounded-lg">
                    <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset($assistant->image ? 'storage/'.$assistant->image : 'images/placeholder.webp') }}" alt="{{ $assistant->name }}" />
                </div>
                <div class="p-5 text-gray-900">
                    <h5 class="mb-2 uppercase font-bold tracking-tight">
                        {{ $assistant->name }}
                    </h5>
                    <p>
                        {{ date('M Y', strtotime($assistant->from)) }} -
                        {{ $assistant->to ? date('M Y', strtotime($assistant->to)) : 'Till Date'}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
