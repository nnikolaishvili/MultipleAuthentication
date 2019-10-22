@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form">
            <h1>Registration</h1>
            <p>Don’t worry it takes less than a minute and it is 100% confidential</p>
            <form action="#">
                @csrf

                <input type="text" placeholder="Name" class="form-input" name="name">
                <input type="text" placeholder="Email" class="form-input" name="email">
                <input type="password" placeholder="password" class="form-input" name="password">
                <input type="password" id="password-confirm" placeholder="confirm password" class="form-input" name="password_confirmation">
                <p>Already have an account? <a href="login">Log In</a></p>
                <button type="submit">Get Started!</button>

                @include('errors')
            </form>
        </div>
        <div class="computer-phone-container">
            <img src="{{ asset('img/phones.png') }}" alt="mobile image">
        </div>
    </div>
    <div>
        <img src="{{ asset('img/line.svg') }}" alt="line">
    </div>
@endsection
