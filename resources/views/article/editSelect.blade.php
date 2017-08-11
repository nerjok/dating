@extends('layouts.app')

@section('content')
<h2> {{ __('Select article to edit')}}</h2>
@foreach($articles as $article)
<a href="{{ url('article')}}/edit/{{$article->id}}"><b>{{$article->title}}</b></a>, <a href="{{ url('article')}}/delete/{{$article->id}}">Delete</a><br>







@endforeach
{{ $articles->links() }}
@endsection