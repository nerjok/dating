  <div class="media">
    <div class="media-body">
   
    <h2 class="media-heading">{{ $user->name }} {{__('table')}}</h2>
  </div>
  <div class="media-right">
    <a href="#">

        @if($user->profile->genphoto)
            <img class="media-object" src="{{asset('storage/profiles/'.$user->profile->user_id.'/'.$user->profile->genphoto) }} " alt="..." height="200" width="200">
            @else
            
      <img class="media-object" src="@if($user->profile->Gender == 'male'){{asset('images/male.png') }} @else {{asset('images/female.png') }} @endif" alt="genderpick">
             
             
              @endif
    </a>

    @if(Auth::check())
      @if(Auth::user()->id != $user->profile->user_id)
        
        <a href="{{url('message/send')}}/{{ $user->id}}">{{ __('Messages') }}</a>
        @if ($user->blocked)
         @if (array_search(Auth::user()->id, unserialize($user->blocked))=== false)
          <a href="{{url('profile/block')}}/{{ $user->id}}">{{ __('Block')}}</a>
          @endif
          @endif
      @endif
   @endif
  </div>

  </div>