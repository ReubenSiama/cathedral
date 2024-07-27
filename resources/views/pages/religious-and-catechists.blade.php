@extends('layouts.main')
@section('content')
<div class="md:container md:mx-auto mx-5 mt-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-7">
            <h1 class="text-center mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                DIOCESE CATECHISTS
            </h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($dioceseCatechists as $dioceseCatechist)
                    <div
                    class="bg-white border border-gray-200
                    rounded-lg shadow
                    dark:bg-gray-800
                    dark:border-gray-700
                    text-center
                    ">
                        <div class="w-full h-60 object-cover rounded-lg">
                            <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset($dioceseCatechist->image ? 'storage/'.$dioceseCatechist->image : 'images/placeholder.webp') }}" alt="{{ $dioceseCatechist->name }}" />
                        </div>
                        <div class="p-5">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">{{ $dioceseCatechist->name }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ date('m-Y', strtotime($dioceseCatechist->from)) }} - 
                                {{ $dioceseCatechist->to ? date('m-Y', strtotime($dioceseCatechist->to)) : 'Till Date' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="rounded-xl bg-gray-100 p-10 col-span-12 md:col-span-5">
            <h1 class="text-center mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $localCatechistWriteup->name }}
            </h1>
            <p class="text-justify text-sm text-gray-700 dark:text-gray-300">
                {{ $localCatechistWriteup->description }}
            </p>
            <div class="text-center text-xs mt-4">
                <div class="w-ful h-44 object-cover rounded-lg border">
                    <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset($localTillNow->image ? 'storage/'.$localTillNow->image : 'images/placeholder.webp') }}" alt="{{ $localTillNow->name }}" />
                </div>
                <div class="">
                    <h5 class="text-sm font-bold tracking-tight text-gray-900 dark:text-white">{{ $localTillNow->name }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ date('m-Y', strtotime($localTillNow->from)) }} - 
                        {{ $localTillNow->to ? date('m-Y', strtotime($dioceseCatechist->to)) : 'Till Date' }}
                    </p>
                </div>
            </div>
            <div class="text-md">
                <div class="font-bold">
                    PARISH IN A LO RAWIH TAWHTE CHU:
                </div>
                <ol class="list-decimal ml-4">
                    @foreach ($localPast as $past)
                        <li class="list-item">{{ $past->name }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="bg-[#22242A]">
    <div class="md:container md:mx-auto mx-5 mt-6 text-white py-10">
        <h1 class="text-center mb-2 text-xl font-bold tracking-tight">
            MISSIONARIES FROM THE PARISH
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-missionaries-container :missionaries=$parishSisters>
                <x-slot name="title">SISTER TE</x-slot>
            </x-missionaries-container>
            <div class="">
                <x-missionaries-container :missionaries=$parishPriests>
                    <x-slot name="title">PUITHIAM TE</x-slot>
                </x-missionaries-container>
                <x-missionaries-container :missionaries=$parishBrothers>
                    <x-slot name="title">BROTHER</x-slot>
                </x-missionaries-container>
            </div>
        </div>
    </div>
</div>
<div class="md:container md:mx-auto mx-5 mt-6 py-10">
    <h1 class="text-center mb-2 text-xl font-bold tracking-tight">
        RELIGIOUS INSTITUTES
    </h1>
    @livewire('religious-institute')
</div>

@endsection
