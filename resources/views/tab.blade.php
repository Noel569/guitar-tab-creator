@extends("components.base")
@section("content")
    <div class="page">
        <meta name="_token" content="{{ csrf_token() }}">
        <meta name="_route" content="{{ route('like', [$tab->id]) }}">
        <h2 class="tab-title">{{ $tab->title }}</h2>
        <p class="tab-performer">{{ $tab->performer }}</p>
        <div class="button-wrapper">
            <button id="play">Play</button>
            <button id="stop" disabled>Stop</button>
            @if(Auth::check() && Auth::user()->id == $tab->user_id)
            <a class="btn blue-btn" href="{{ route('edit', [$tab->id]) }}">Edit</a>
            @endif
        </div>
        <div class="tab read-only">
            <input class="bpm" type="number" value="{{ $tab->tempo }}">
            <input class="hidden-tab" style="display: none;" value="{{ $tab->tab }}">
        </div>
        <div class="response-wrapper">
            <div class="like-wrapper">
                <img class="empty-like-icon" src="{{url('images/empty-heart.png')}}" alt="empty heart">
                @if (Auth::check() && $tab->likes->filter(function ($like){
                    return $like->user_id == Auth::user()->id;
                })->count())
                <img id="like-icon" class="like-icon" src="{{url('images/heart.png')}}" alt="empty heart">
                @else
                <img id="like-icon" class="like-icon inactive" src="{{url('images/heart.png')}}" alt="empty heart">
                @endif
            </div>
            <p id="like-counter" class="counter">{{ $tab->likes->count() }}</p>
            <img class="comment-icon" src="{{url('images/comment.png')}}" alt="comment">
            <p class="counter">{{ $tab->comments->count() }}</p>
        </div>
        <form class="comment-editor" action="{{ route('comment', [$tab->id]) }}" method="POST">
            @csrf
            <textarea rows="3" name="comment" placeholder="Leave a comment..."></textarea>
            <button class="comment-button">Post Comment</button>
        </form>
        <div class="comments-wrapper">
            @foreach($tab->comments as $comment)
            <div class="comment">
                <p class="comment-name">{{ $comment->user->username }}</p>
                <p class="comment-date">{{ date("Y.m.d. H:i", strtotime($comment->created_at)) }}</p>
                <p class="comment-text">{{ $comment->comment }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @vite(['resources/js/tabgenerator.js', 'resources/js/tabplayer.js', 'resources/js/buttons.js'])
@endsection