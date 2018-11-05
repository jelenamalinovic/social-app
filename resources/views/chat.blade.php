@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @auth
            <chat-room :user="{{ auth()->user() }}"></chat-room>
        @endauth
    </div>
</div>

@endsection
