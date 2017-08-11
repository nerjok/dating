@extends('layouts.app')

@section('content')

<h2>{{ __('User\'s profile') }}</h2>

<div class="row">
@foreach($users as $user)
<div class="col-xs-6 col-sm-4">
{{ $user->Birth}}

<div class="panel panel-default">
  <div class="panel-body" style="background:white;">
        <img class="pull-right img-responsive" src="@if($user->Gender == 'male'){{asset('images/male.png') }} @else {{asset('images/female.png') }} @endif" alt="...">
<a href="{{ url('profile')}}/{{$user->user_id}}">
    <b>{{ $user->user->name }},
    {{$user->Birth}}
    {{$user->lives}},
    {{$user->Gender}},
    {{$user->BirthDate}} {{_('y.')}}
    </b></a>
  </div>
</div>

<br>
</div>

@endforeach
</div>
@endsection