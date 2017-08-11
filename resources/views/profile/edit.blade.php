@extends('layouts.app')

@section('content')

<br>
<div class="panel panel-default">
  <div class="panel-body">
  @if($user->profile)

      @include ('profile.profileheader')
  @endif

<form method="POST" action="{{ url('profile/edit') }}">

{{ csrf_field() }}
{{ method_field('PUT') }}
  <div class="form-group">
    <label for="exampleInputEmail1">{{ __('Username') }}</label>
<input type="text" name="username" value="@if ($user->profile) {{$user->profile->username}}@else{{ old('username') }} @endif" class="form-control">
</div>

        <div class="form-group">
                <label for="exampleInputEmail1">{{ __('Gender') }}</label>
            <select name="gender" class="form-control">
                        <option value="male">{{ __('Male')}}</option>

            <option value="female">{{ __('Female')}}</option>
            </select>
        </div>
              <div class="form-group">
                <label for="exampleInputEmail1">{{ __('Birthdate') }}</label>
                    <input type="date" name="bdate" value="@if($user->profile){{$user->profile->getOriginal('BirthDate')}}@else{{ old('bdate') }}@endif"  class="form-control" >
                
                </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{ __('Where do you live') }}</label>
<select name="lives"  class="form-control"><option value="0">Nenurodyta</option><option disabled=""></option>
<option value="10078">Vilnius</option><option value="2072">Kaunas</option>
<option value="3039">Klaipėda</option><option value="6044">Šiauliai</option><option value="8010">Mažeikiai</option><option value="5024">Panevėžys</option><option value="1001">Alytus</option>
<option value="4018">Marijampolė</option><option value="8021">Telšiai</option><option disabled=""></option>

<option value="10127">Akmenės rajonas</option>
<option value="10128">Alytaus rajonas</option><option value="10129">Anykščių rajonas</option><option value="10131">Birštono savivaldybė</option><option value="10132">Biržų rajonas</option>
<option value="10133">Druskininkų savivaldybė</option><option value="10134">Elektrėnų savivaldybė</option><option value="10135">Ignalinos rajonas</option>
<option value="10136">Jonavos rajonas</option><option value="10137">Joniškio rajonas</option><option value="10138">Jurbarko rajonas</option><option value="10139">Kaišiadorių rajonas</option>
<option value="10140">Kalvarijos savivaldybė</option><option value="10141">Kauno rajonas</option><option value="10142">Kazlų Rūdos savivaldybė</option>
<option value="10143">Kėdainių rajonas</option><option value="10144">Kelmės rajonas</option><option value="10145">Klaipėdos rajonas</option><option value="10146">Kretingos rajonas</option>
<option value="10147">Kupiškio rajonas</option><option value="10148">Lazdijų rajonas</option><option value="10149">Marijampolės savivaldybė</option>
<option value="10150">Mažeikių rajonas</option><option value="10151">Molėtų rajonas</option><option value="10126">Neringos savivaldybė</option><option value="10152">Pagėgių savivaldybė</option>
<option value="10153">Pakruojo rajonas</option><option value="10179">Palangos savivaldybė</option><option value="10130">Panevėžio rajonas</option><option value="10154">Pasvalio rajonas</option>
<option value="10155">Plungės rajonas</option><option value="10156">Prienų rajonas</option><option value="10157">Radviliškio rajonas</option><option value="10158">Raseinių rajonas</option>
<option value="10159">Rietavo savivaldybė</option><option value="10160">Rokiškio rajonas</option><option value="10161">Skuodo rajonas</option><option value="10162">Šakių rajonas</option>
<option value="10163">Šalčininkų rajonas</option><option value="10164">Šiaulių rajonas</option><option value="10165">Šilalės rajonas</option><option value="10166">Šilutės rajonas</option>
<option value="10167">Širvintų rajonas</option><option value="10168">Švenčionių rajonas</option><option value="10169">Tauragės rajonas</option><option value="10170">Telšių rajonas</option>
<option value="10171">Trakų rajonas</option><option value="10172">Ukmergės rajonas</option><option value="10173">Utenos rajonas</option><option value="10174">Varėnos rajonas</option>
<option value="10175">Vilkaviškio rajonas</option><option value="10176">Vilniaus rajonas</option><option value="10177">Visagino savivaldybė</option><option value="10178">Zarasų rajonas</option>

</select>


<!--<input type="text" name="lives"  class="form-control" value="@if ($user->profile) {{$user->profile->lives}}@else{{ old('lives') }} @endif">-->
</div>
                <div class="form-group">
                <label for="exampleInputEmail1">{{ __('Status') }}</label>
                    <select name="status" class="form-control">
                    <option value="free">{{ __('Free')}}</option>
                    <option value="divorced">{{ __('Divorced')}}</option>
                    <option value="complicated">{{ __('Complicated')}}</option>
                    <option value="engaded">{{ __('Engaged')}}</option>
                    <option value="notsure">{{ __('Not sure')}}</option>
                    </select>                
            </div><hr>

    <div class="form-group">
    <label for="exampleInputEmail1">{{ __('Description') }}</label>
<textarea type="text" name="description" class="form-control">@if ($user->profile) {{$user->profile->description}}@else{{ old('description') }} @endif</textarea>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{ __('Looking for') }}</label>
<textarea type="text" name="looks"class="form-control">@if ($user->profile) {{$user->profile->lookingFor}}@else{{ old('looks') }} @endif</textarea>
</div>
<input type="submit" value="{{ __('Save') }}">

</form>


@include('layouts.error')
@if($user->profile)
        @if (unserialize($user->profile->photo) != null)

          @foreach(unserialize($user->profile->photo) as $file)
          <a href="{{asset('storage/profiles/'.$user->profile->user_id.'/full/'.$file)}}">
        <img src="{{asset('storage/profiles/'.$user->profile->user_id.'/'.$file)}}" height="200" width="200" alt="profile photo">
        </a>

        <a href="{{ url('photo/'.$user->profile->user_id.'/'.$file)}}">{{ __('Make general')}}</a>
        <a href="{{ url('delete/'.$file)}}">{{ __('Delete')}}</a><br>


          @endforeach

        @endif

  @endif

</div>
</div>
@endsection