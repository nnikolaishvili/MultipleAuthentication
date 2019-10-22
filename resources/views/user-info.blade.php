@extends('layouts.app')

@section('content')
    <div class="user-container">
        <h1>Welcome To Your Profile!</h1>

        <h2>ID: {{ $user->id }}</h2>
        <h2>Name: {{ $user->name }}</h2>
        <h2>email: {{ $user->email }}</h2>
    </div>
@endsection
