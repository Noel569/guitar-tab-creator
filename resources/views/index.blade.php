@extends("components.base")
@section("content")
    <div class="page">
        <h1 class="front-page-title">Guitar Tab Creator</h1>
        <h2 class="front-page-subtitle">
            Create your own tab and share it with others!
            <br>
            Browse other tabs and have fun!
        </h2>
        <form class="search-wrapper">
            <input type="text" id="search" placeholder="Find your song">
        </form>
        @include('components.tab_card')
        <input type="hidden" id="page" value="1">
    </div>
    @vite('resources/js/search.js')
@endsection