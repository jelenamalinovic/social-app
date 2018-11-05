@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @auth
               <single :post="{{$post}}" :user="{{auth()->user()}}"></single>
            @endauth

        </div>
    </div>

@endsection
