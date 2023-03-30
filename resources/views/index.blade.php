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
            <button type="submit">Search</button>
        </form>
        <div class="tab-list">
            @foreach($tabs as $tab)
                <div class="tab-card" href="#">
                    <div class="tab-card-front">
                        <h2>{{ $tab["title"] }}</h2>
                        <p class="tab-performer">{{ $tab["performer"] }}</p>
                        <p class="tab-maker">By: {{ $tab["user"] }}</p>
                        <p>Tuning: {{ $tab["tuning"] }}</p>
                        <div class="tab-card-response-wrapper">
                            <div class="tab-card-likes">
                                <img class="tab-card-like-icon" src="images/heart.png" alt="tab-card-likes">
                                <p>{{ $tab["likes"] }}</p>
                            </div>
                            <div class="tab-card-comments">
                                <img class="tab-card-comment-icon" src="images/comment.png" alt="tab-card-comments">
                                <p>{{ $tab["comments"] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-card-back">
                        <a class="btn tab-btn" href="{{ route('tab') }}">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection