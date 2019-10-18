@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form">
            <h1>Log In</h1>
            <p>Need a LeadRebel account? <br><a href="">Create an account</a></p>
            <form action="#">
                @csrf

                <input type="text" placeholder="Email" class="form-input">
                <input type="password" placeholder="password" id="password" class="form-input">
                <span><a href="">Forgot password?</a></span>
                <div class="checkbox">
                    <input type="checkbox" name="keep-logged-in">
                    <label for="keep-logged-in">keep me logged in</label>
                </div>

                <button type="submit">Login</button>
            </form>
        </div>
        <div class="phone-container">
            <img src="{{ asset('img/phone/phone.png') }}" alt="mobile image">
        </div>
    </div>
    <div>
        <img src="{{ asset('img/line.svg') }}" alt="line">
    </div>
@endsection
