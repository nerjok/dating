@extends('layouts.app')

@section('content')

<h2> {{ __('Create tag')}} </h2>
@if($tag2->name != null)
<form method="POST" action="{{ url('tag/update') }}/{{$tag2->name}}">

{{ csrf_field() }}
{{ method_field('PUT') }}
<input type="text" name="tagname" value="@if(! (old('title')) != null) {{$tag2->name}} @else {{ old('title') }} @endif">
<input type="submit" value="{{ __('Save') }}">

</form>
@endif

@foreach($tagList as $tags)

{{$tags->name}}
<a href="{{ url('tag/update') }}/{{$tags->name}}">Edit</a>
<a href="{{ url('tag/delete') }}/{{$tags->name}}">Delete</a><br>
@endforeach

@include('layouts.error')
@endsection