@extends('layouts.app')

@section('content')

<h2> {{ __('Create tag')}} </h2>


<form method="POST" action="{{ url('tag/create') }}">

{{ csrf_field() }}
{{ method_field('PUT') }}
<input type="text" name="tagname">
<input type="submit" value="{{ __('Save') }}">

</form>

@include('layouts.error')
@endsection
