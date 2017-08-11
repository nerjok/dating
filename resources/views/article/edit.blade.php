@extends('layouts.app')

@section('content')

<h2> {{ __('Edit Article')}} </h2>


<form method="POST" action="{{ url('article/update')}}/{{$article->id}}">

{{ csrf_field() }}
{{ method_field('PUT') }}
<input type="text" name="title" value="@if($article) {{$article->title}} @else {{ old('title') }} @endif">
<input type="text" name="content2">
<textarea name="content">@if($article) {{$article->content}} @else {{ old('content') }} @endif</textarea>
<input type="submit" value="{{ __('Save') }}">
</form>

@include('layouts.error')
@endsection