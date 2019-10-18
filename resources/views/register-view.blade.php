@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form">
            <h1>Registration</h1>
            <p>Don’t worry it takes less than a minute and it is 100% confidential</p>
            <form action="#">
                @csrf

                <input type="text" placeholder="Email" class="form-input">
                <input type="password" placeholder="password" id="password" class="form-input">
                <p>Already have an account? <a href="">Log In</a></p>
                <button type="submit">Get Started!</button>
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
