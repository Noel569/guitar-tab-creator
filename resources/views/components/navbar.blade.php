<div class="header">
    <img class="guitar-icon" src="{{url('images/guitar-icon.png')}}" alt="icon">
    <a href="{{ route('landing') }}" <?= request()->routeIs('landing') ? 'style="display: none;"' : ''?>>Home</a>
    @if(!Auth::check())
    <a href="{{ route('login') }}" <?= request()->routeIs('login') ? 'style="display: none;"' : ''?>>Login</a>
    <a href="{{ route('register') }}" <?= request()->routeIs('register') ? 'style="display: none;"' : ''?>>Register</a>
    @else
    <a href="{{ route('editor') }}" <?= request()->routeIs('editor') ? 'style="display: none;"' : ''?>>Create Tab</a>
    <a href="{{ route('profile') }}" <?= request()->routeIs('profile') ? 'style="display: none;"' : ''?>>Profile</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="nav" type="submit">Log out</button>
    </form>
    @endif
</div>