<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use \Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth')->except('index','searchProfile', 'show' );

    }
    /**
     * Display a listing of the profiles
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              $userId = 0;
      if (\Auth::check()):

        $userId = \Auth::user()->id;

      endif;

        $users = \App\User::select('name', 'id', 'blocked')
                            ->where('id', '!=', $userId)
                            ->has('profile')->paginate(18);

       
        return view('profile.index', compact('users'));
    }


    /**
     *
     * @description profile search function
     * @return found users
     */
     public function searchProfile(\App\Http\Requests\searchRequest $request)
     {

 

        $now = \Carbon\Carbon::now();

            $from = $now->subYear($request->input('ageTo')); 
  
            $now = \Carbon\Carbon::now();
                        
                        $to = $now->subYears($request->input('ageFrom'));

                        $lives =$request->input('lives');

                        if($lives == '') $lives = false;
      $userId = 0;
      if (\Auth::check()):

        $userId = \Auth::user()->id;

      endif;
var_dump($lives);
       $sex = $request->input('gender');
         $users = Profile::where('user_id', '!=', $userId)
                            ->wherein('Gender', $sex)
                            ->whereBetween('BirthDate', [$from, $now])
                             ->when($lives, function ($query) use ($lives) {
                                return $query->where('lives', '=', $lives);})
                            ->paginate(10);
         
       return view('profile.fusers', compact('users'));
     }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.photo');
    }

    /**
     * Store photos in storage.
     *
     * @param  profile and request
     * @return changed and save array of photo
     */
    public function store(Profile $profile, Request $request)
    {
                         $this->validate($request, [
                                       // 'fileUp' => 'required|array|between:1,5',

                                        'fileUp.*' => 'required|file|max:2000|image',
                             ]);




                             $fileAr = array();
                             if($profile->photo != null) {
               
                                     $fileAr = unserialize($profile->photo);
                             }

                   // var_dump($fileAr);

          $file = $request->file('fileUp');





                if ($request->hasFile('fileUp')) {
       
                    $path = "profiles/".\Auth::User()->id.'/';

                        foreach($file as $data):


$name = \Carbon\Carbon::now()->timestamp;

$fileName = $name.'.jpg';
                        
        Storage::disk('public')->putFileAs($path.'full/', $data, $fileName);

 $img2 = $image = Image::make($data)->resize(300, 200);

$img2->save('storage/'.$path.$fileName, 60);

//Storage::disk('public')->put($path.'full/'.$fileName, $data);


//$data->storeAS($path.'/full/', $fileName);

                          //  $file = $data->store($path);


                              $fileAr[] =$fileName;

                        endforeach;
                            
                    $profile->photo = serialize($fileAr);

                  $profile->save();
                }
                


        return redirect()->back();

    }
    /**
     * @param profile injection, photo name
     *
     * @return back with changes profiel photo
     */
    public function photo(Profile $profile, $photo)
    {

        $profile->genphoto = $photo;

        $profile->save();

            return redirect()->back();
    }


    

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(\App\User $user =null)
    {
        if (! $user->profile) return $this->edit($user);

      if ($user->blocked AND \Auth::check()):
            if (array_search(\Auth::user()->id, unserialize($user->blocked))!== false) return redirect()->home();
      endif;

       return view('profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
                $user = \Auth::user();

                return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {

      if (\Auth::user()->profile == false):

          $profile = new Profile();
      else:

        $profile = \Auth::user()->profile;

      endif;

        $profile->username = $request->input('username');

        $profile->status = $request->input('status');

        $profile->gender = $request->input('gender');

        $profile->lives = $request->input('lives');

        $profile->birthdate = $request->input('bdate');

        $profile->description = $request->input('description');

        $profile->lookingFor = $request->input('looks');

        $profile->user_id = \Auth::user()->id;

        $profile->save();


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($photo)
    {
        $profile = \Auth::user()->profile;


            $photos =  unserialize($profile->photo);

            $photoKey =  array_search($photo, $photos);

            unset($photos[$photoKey]);

            if($profile->genphoto == $photo) {
                $profile->genphoto = null;
            }

        $profile->photo = serialize($photos);

        $profile->save();




            Storage::disk('public')->delete('profiles/'.\Auth::user()->id.'/'.$photo);

            Storage::disk('public')->delete('profiles/'.\Auth::user()->id.'/full/'.$photo);

            return redirect()->back();
    }


    Public function blockUser($blockWho)
    {


$list = [];
            $user = \Auth::user();

            if ($user->blocked != null):
            
                    $list =  unserialize($user->blocked);
            endif;
                    $isBlocked =  array_search ($blockWho, $list);

                    if ($isBlocked === false)
                    {
                      
                         $list[]= $blockWho;
                    }

            $user->blocked = serialize($list); 
            $user->save();

        return redirect()->back();
    }

    public function blocked() 
    {   
        $list2 = \Auth::user()->blocked;

        $users = null;
                    if ($list2 != null):
            
                    $list =  unserialize($list2);
            

          
        $users =\App\User::select('id', 'name')->whereIn('id', $list)->get();
        endif;

        return view('profile.blocked', compact('users'));
        
    }


    /**
     * Unblock blocked person
     *
     *
     */
    Public function unblock($blockWho)
    {



            $user = \Auth::user();

            if ($user->blocked != null):
            
                    $list =  unserialize($user->blocked);
            
                    $isBlocked =  array_search ($blockWho, $list);

                    if ($isBlocked !== false)
                    {
                       unset($list[$isBlocked]);
                        
                    }
            
            $user->blocked = serialize($list); 
            endif;
            $user->save();

        return redirect()->back();
    }
}
