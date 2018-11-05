@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @auth
            <read :user_id="null"></read>
        @endauth
    </div>
</div>

@endsection
