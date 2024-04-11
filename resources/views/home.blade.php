@extends('layouts.main')
@section('content')
    <div class="h-96 bg-no-repeat bg-cover rounded-lg"
    style="background-image: url('https://picsum.photos/1024/764')">
        <div class="rounded-lg content-center items-center justify-center text-center
        w-full h-full backdrop-brightness-50 text-white
        ">
            {{-- <div class="font-extrabold text-xl">MASS TIMING</div> --}}
            <table class="table w-96 m-auto">
                <caption>MASS TIMING</caption>
                <thead>
                    <tr>
                        <th></th>
                        <th>English</th>
                        <th>Mizo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sunday</td>
                        <td>7:00am</td>
                        <td>10:00am</td>
                    </tr>
                    <tr>
                        <td>Monday - Friday</td>
                        <td>-</td>
                        <td>6:30am</td>
                    </tr>
                    <tr>
                        <td>Saturday</td>
                        <td>7:00am</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    This is content
@endsection
