@extends('layouts.main')
@section('content')
<div class="md:container md:mx-auto mx-5 mt-6">
    @livewire('institutions', ['institutions' => $institutions])
</div>
@endsection
