@extends('layouts.app')

@section('content')

<br>
<div class="panel panel-default">
  <div class="panel-body">
  <div class="media">
    <div class="media-body">
   
    <h2 class="media-heading">{{-- $user->name --}} {{__('messaging ')}}</h2>
  </div>

@foreach($messages as $message)


<a href="{{url('messages')}}/{{ $message->sender_id}}">
{{ $message->user->name}}</a>
<br>
@endforeach
</div>
</div>
</div>
@endsection