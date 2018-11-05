@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @auth
                <profile :user_id='@json(auth()->user()->id)'></profile>
            @endauth

        </div>
    </div>
@endsection
