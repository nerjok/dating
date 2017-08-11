@extends('layouts.app')

@section('content')

<h2> {{ __('Create Article')}} </h2>


<form method="POST" action="article">

{{ csrf_field() }}
{{ method_field('PUT') }}
<input type="text" name="title" value="{{ old('title') }}">
<textarea name="content">{{ old('content') }}</textarea>
<input type="submit" value="{{ __('Save') }}">

<?php
//var_dump($tag);
?>
<select multiple name="tag[]">

  @foreach($tag as $entry)
    
    <option value="{{ $entry->id }}">{{ $entry->name }}</option>

  @endforeach
</select>
</form>

@include('layouts.error')
@endsection

