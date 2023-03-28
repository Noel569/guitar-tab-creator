@extends("components.base")
@section("content")
    <div class="page form-page">
        <form class="form-wrapper" action="register">
            <label for="username">E-mail Address</label>
            <input type="email" id="username" placeholder="Enter E-mail Address">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter Password">
            <button type="submit">Login</button>
        </form>
    </div>
@endsection