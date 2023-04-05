@extends("components.base")
@section("content")
    <div class="page">
        <h2 class="tab-title">{{ $tab->title }}</h2>
        <p class="tab-performer">{{ $tab->performer }}</p>
        <div class="tab"></div>
        <div class="response-wrapper">
            <img class="empty-like-icon" src="{{url('images/empty-heart.png')}}" alt="empty heart">
            <p class="counter">{{ $tab->likes->count() }}</p>
            <img class="comment-icon" src="{{url('images/comment.png')}}" alt="comment">
            <p class="counter">{{ $tab->comments->count() }}</p>
        </div>
        <form class="comment-editor">
        <textarea rows="3" placeholder="Leave a comment..."></textarea>
        <button type="submit">Post Comment</button>
        </form>
        <div class="comments-wrapper">
            @foreach($tab->comments as $comment)
            <div class="comment">
                <p class="comment-name">{{ $comment->user->username }}</p>
                <p class="comment-date">2 days ago</p>
                <p class="comment-text">{{ $comment->comment }}</p>
            </div>
            @endforeach
        </div>
    </div>
@endsection