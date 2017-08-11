<!-- header  -->
         <div class=" head-ind">
                @include ('layouts.menu')
                <div class="tld">
                   <nav class="navbar navbar-default container">
            <p class="navbar-text">{{ __('I am looking for')}}</p>
                
                   <form method="POST" action="{{ url('profile')}}" class="navbar-form navbar-left" >
                   {{ csrf_field() }}
{{ method_field('PUT') }}

                            <div class="form-group">
                                {{ __('Women')}}    <input type="checkbox" name="gender[]" value="female" class="form-control">
                            </div>

                            <div class="form-group">
                                {{ __('Man')}}     <input type="checkbox" name="gender[]" value="male" class="btn btn-primary btn-lg">
                            </div>

                    
                        <div class="form-group">
                                <select name="ageFrom" class="form-control">

                                @for($i = 15; $i<99; $i++)
                                    
                                    <option value="{{ $i }}">{{ $i }}</option>

                                @endfor
                                <option value="18" selected>18</option>
                                </select>
                    </div>

                                            <div class="form-group">
                                <select name="ageTo" class="form-control">

                                @for($i = 18; $i<99; $i++)
                                    
                                    <option value="{{ $i }}">{{ $i }}</option>

                                @endfor
                                <option value="99" selected>99</option>
                                </select>
                                <select name="lives"  class="form-control"><option value="">Nenurodyta</option><option disabled=""></option>
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
                    </div>
                   <input type="submit" value="{{ __('Save') }}" class="btn btn-default">
                   </form>
                  
                    </nav>


                </div>
          </div>