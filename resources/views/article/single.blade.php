@extends('layouts.app')

@section('content')

<h2>{{$article->title}}</h2>

<p>{{$article->content}}</p>

<br>
@foreach ($article->tags as $tag)
   <a href="{{ url('article')}}/tag/{{$tag->name}}">{{$tag->name}}</a>
@endforeach
@endsection