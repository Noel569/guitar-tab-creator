<div class="test">
    <div class="tab-list">
        @foreach($tabs as $tab)
            <div class="tab-card">
                <div class="tab-card-front">
                    <h2>{{ $tab->title }}</h2>
                    <p class="tab-performer">{{ $tab->performer }}</p>
                    <p class="tab-maker">By: {{ $tab->user->username }}</p>
                    <p>Tuning: {{ $tab->tuning->name }}</p>
                    <div class="tab-card-response-wrapper">
                        <div class="tab-card-likes">
                            <img class="tab-card-like-icon" src="{{url('images/heart.png')}}" alt="tab-card-likes">
                            <p>{{ $tab->likes->count() }}</p>
                        </div>
                        <div class="tab-card-comments">
                            <img class="tab-card-comment-icon" src="{{url('images/comment.png')}}" alt="tab-card-comments">
                            <p>{{ $tab->comments->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="tab-card-back">
                    <a class="btn blue-btn tab-btn" href="{{ route('tab', [$tab->id]) }}">View</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination">
        {{ $tabs->appends(request()->query())->links('vendor.pagination.default') }}
    </div>
</div>