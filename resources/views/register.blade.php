@extends("components.base")
@section("content")
    <div class="page form-page">
        <form class="form-wrapper" action="register">
            <label for="email">E-mail Address</label>
            <input type="email" id="email" placeholder="Enter E-mail Address">
            <label for="username">Username</label>
            <input type="text" id="username" placeholder="Enter Username">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter Password">
            <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" placeholder="Confirm Password">
            <button type="submit">Register</button>
        </form>
    </div>
@endsection