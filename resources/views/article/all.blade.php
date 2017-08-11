@extends('layouts.app')

@section('content')

@foreach($articles as $article)
<h2><a href="{{ url('article')}}/{{$article->id}}">{{$article->title}}</a></h2>

<p>{{$article->content}}</p>

<br>

@endforeach
{{ $articles->links() }}
@endsection