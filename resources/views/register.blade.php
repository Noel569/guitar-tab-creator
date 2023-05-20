@extends("components.base")
@section("content")
    <div class="page form-page">
        <form class="form-wrapper" action="{{ route('register.store') }}" method="POST">
            @csrf
            <label for="email">E-mail Address</label>
            <input type="email" name="email" placeholder="Enter E-mail Address">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter Username">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter Password">
            <label for="confirm">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
            <button type="submit">Register</button>
            @include("components.errors")
        </form>
    </div>
@endsection