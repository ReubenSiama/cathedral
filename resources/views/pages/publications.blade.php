@extends('layouts.main')
@section('content')
<div class="md:container md:mx-auto mx-5 mt-6">
    <h1 class="text-center mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
        {{ $parishPastoralCouncil->name }}
    </h1>
    {!! $parishPastoralCouncil->value !!}
</div>
@endsection
