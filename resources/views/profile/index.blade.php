@extends('layouts.app')

@section('content')

<h2>{{ __('User\'s profile') }}</h2>

<div class="row">
@foreach($users as $user)

@if ($user->blocked AND Auth::check())
  @if (array_search(Auth::user()->id, unserialize($user->blocked))!== false)
  @continue
  @endif
@endif
      <div class="col-xs-6 col-sm-4">


      <div class="panel panel-default">
        <div class="panel-body" style="background:white;">

                  @if($user->profile->genphoto)
                  <img class="media-object" src="{{asset('storage/profiles/'.$user->profile->user_id.'/'.$user->profile->genphoto) }} " alt="..." height="200" width="200">
                  @else
                  
            <img class="media-object" src="@if($user->profile->Gender == 'male'){{asset('images/male.png') }} @else {{asset('images/female.png') }} @endif" alt="...">
                  
                  
                    @endif
      <a href="{{ url('profile')}}/{{$user->id}}">
          <b>{{ $user->profile->username }},
          {{$user->profile->Birth}}
          {{ __('cities.'.$user->profile->lives)}},
          {{$user->profile->Gender}},
          {{$user->profile->BirthDate}} {{_('y.')}}
          
          </b></a>
        </div>
      </div>

      <br>
      </div>

@endforeach
</div>
@endsection