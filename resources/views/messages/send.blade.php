@extends('layouts.app')

@section('content')

<br>
<div class="panel panel-default">
  <div class="panel-body">
  <div class="media">
    <div class="media-body">
   
    <h2 class="media-heading">{{-- $user->name --}} {{__('messaging ')}}</h2>
  </div>

<form method="POST" action="{{url('message/send')}}/{{ $receiver}}">

{{ csrf_field() }}
{{ method_field('PUT') }}



<input type="hidden" name="receiver" value="{{$receiver}}">
<input type="hidden" name="sender" value="{{Auth::user()->id}}">
  <div class="form-group">
    <label for="exampleInputEmail1">{{ __('Message text') }}</label>
<textarea type="text" name="message" class="form-control"></textarea>
</div>
<input type="submit" value="{{ __('Save') }}">

</form>

@include('layouts.error')
</div>
</div>
</div>
@endsection