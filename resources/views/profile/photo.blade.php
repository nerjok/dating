@extends('layouts.app')

@section('content')
<br>
<div class="panel panel-default">
  <div class="panel-body">

  
   
    <h2 class="media-heading">{{ __('Profile photo upload')}}</h2>


<form method="POST" action="{{url('profile/photo')}}/{{ Auth::user()->id}}" enctype="multipart/form-data" >

{{ csrf_field() }}
{{ method_field('PUT') }}



  <div class="form-group">
    <label for="file">{{ __('Select  files to upload') }}</label>
    <input type="file" name="fileUp[]">

</div>
<input type="submit" value="{{ __('Save') }}">

</form>

@include('layouts.error')

</div>
</div>
@endsection