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
                        <h2>{{ $tab->title }}</h2>
                        <p class="tab-performer">{{ $tab->performer }}</p>
                        <p class="tab-maker">By: {{ $tab->user->username }}</p>
                        <p>Tuning: {{ $tab->tuning->name }}</p>
                        <div class="tab-card-response-wrapper">
                            <div class="tab-card-likes">
                                <img class="tab-card-like-icon" src="{{url('images/heart.png')}}" alt="tab-card-likes">
                                <p>0</p>
                            </div>
                            <div class="tab-card-comments">
                                <img class="tab-card-comment-icon" src="{{url('images/comment.png')}}" alt="tab-card-comments">
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-card-back">
                        <a class="btn tab-btn" href="{{ route('tab', [$tab->id]) }}">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection