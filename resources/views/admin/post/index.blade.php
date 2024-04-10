@extends('layouts.admin')
@section('content')
    <div>

        @foreach($posts as $post)
            <div>
                <a href="{{route('admin.post.show', $post->id)}}">{{$post->id}}.{{$post->title}}</a>
            </div>
        @endforeach
        <div class="mt-3">
            {{$posts->withQueryString()->links('pagination::bootstrap-5')}}
        </div>
    </div>
@endsection
