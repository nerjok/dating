@extends('layouts.app')

@section('content')

<br>
<div class="panel panel-default">
  <div class="panel-body">
@if ($users != null)
@foreach($users as $user)

{{$user->name}}
<a href="unblock/{{$user->id}}"> {{__('Unblock user')}}</a>
<br>
@endforeach
@endif
</div>
</div>
@endsection