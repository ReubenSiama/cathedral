@extends('layouts.main')
@section('carousel')
    <section class="bg-gray-200 dark:bg-gray-900 mb-10">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl dark:text-white">Institutions</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400"></p>
        </div>
    </section>
@endsection
@section('content')
<div class="md:container md:mx-auto mx-5">
    <livewire:info-card :items="$institutions" :clickable="true" model="Institution"/>
</div>
@endsection
