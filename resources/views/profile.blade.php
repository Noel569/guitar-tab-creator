@extends("components.base")
@section("content")
    <div class="page">
        <h2 class="profile-page-title">About me</h2>
        <div class="information-wrapper">
            <table class="information">
                <tr>
                    <td class="information-bold">Username:</td>
                    <td>{{ $username }}</td>
                </tr>
                <tr>
                    <td class="information-bold">E-mail Address:</td>
                    <td>{{ $email }}</td>
                </tr>
                <tr>
                    <td class="information-bold">Password:</td>
                    <td><a href="#">Change Password</a></td>
                </tr>
            </table>
        </div>
        <h2 class="profile-page-title">My tabs</h2>
        <div class="tab-list">
            @foreach($tabs as $tab)
            <div class="tab-card" href="#">
                <div class="tab-card-front">
                    <h2>{{ $tab->title }}</h2>
                    <p class="tab-performer">{{ $tab->performer }}</p>
                    <p>Tuning: {{ $tab->tuning->name }}</p>
                    <div class="tab-card-response-wrapper">
                        <div class="tab-card-likes">
                            <img class="tab-card-like-icon" src="images/heart.png" alt="tab-card-likes">
                            <p>{{ $tab->likes->count() }}</p>
                        </div>
                        <div class="tab-card-comments">
                            <img class="tab-card-comment-icon" src="images/comment.png" alt="tab-card-comments">
                            <p>{{ $tab->comments->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="tab-card-back">
                    <a class="btn blue-btn tab-btn" href="{{ route('edit', [$tab->id]) }}">Edit</a>
                    <a class="btn tab-btn red-btn" href="#">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection