@extends('layouts.app')

@section('content')
<br>
<div class="panel panel-default">
  <div class="panel-body">




                @include ('profile.profileheader')



                <br>
                <b>{{ __('Name')}}: </b> {{ $user->profile->username}}<br><hr>
                <b>{{ __('Gender')}}: </b> {{ $user->profile->Gender}}<br><hr>
                <b>{{ __('Country')}}: </b>{{ __('cities.'.$user->profile->lives)}}<br><hr>
                <b>{{ __('Age')}}: </b>{{ $user->profile->BirthDate}}<br><hr>
                <b>{{ __('Status')}}: </b>{{ $user->profile->status}}<br><hr>
                <b>{{ __('Description')}}:</b><br>{{ $user->profile->description}}<hr>
                <b>{{ __('Looking for')}}</b><br>{{ $user->profile->lookingFor}}<br><hr>



                @if (unserialize($user->profile->photo) != null)

                  @foreach(unserialize($user->profile->photo) as $file)
                  <a href="{{asset('storage/profiles/'.$user->profile->user_id.'/full/'.$file)}}">
                <img src="{{asset('storage/profiles/'.$user->profile->user_id.'/'.$file)}}" height="200" width="200" alt="profile photo">
                </a>
                  @endforeach

                @endif


</div>
</div>
@endsection











