@extends("components.base")
@section("content")
    <div class="page form-page">
        <form class="form-wrapper" action="{{ route('login.login') }}" method="POST">
            @csrf
            <label for="email">E-mail Address</label>
            <input type="email" name="email" placeholder="Enter E-mail Address">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter Password">
            <button type="submit">Login</button>
            @include("components.errors")
        </form>
    </div>
@endsection