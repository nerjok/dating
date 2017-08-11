<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
body {
background-color: #343a21;
opacity: 0.9;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='96' viewBox='0 0 60 96'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23343317' fill-opacity='0.48'%3E%3Cpath d='M36 10a6 6 0 0 1 12 0v12a6 6 0 0 1-6 6 6 6 0 0 0-6 6 6 6 0 0 1-12 0 6 6 0 0 0-6-6 6 6 0 0 1-6-6V10a6 6 0 1 1 12 0 6 6 0 0 0 12 0zm24 78a6 6 0 0 1-6-6 6 6 0 0 0-6-6 6 6 0 0 1-6-6V58a6 6 0 1 1 12 0 6 6 0 0 0 6 6v24zM0 88V64a6 6 0 0 0 6-6 6 6 0 0 1 12 0v12a6 6 0 0 1-6 6 6 6 0 0 0-6 6 6 6 0 0 1-6 6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.head-ind {
    height:200px;
    background: lightblue;
    position: relative;

   background: url({{ asset('images/header.jpg') }}); /*url("img/header.jpg");*/
               background-size:cover;
              min-height:100px;
}

.head-bottom {
width: 100%;
     position: absolute;
 bottom: 0;
    background: white;

   
}

.tld {
    position: absolute; 
    bottom: 0px; 
    margin-bottom: 0px;
    left: 0px;
    right:0px;
}

.tld nav {
     bottom: 0px; 
    margin-bottom: 0px;
}

.cont {
    background: white;
    min-height: 500px;
}

.container {
    width: 65%;
}

nav {
    background: black;
    opacity: 0.5;
}

.footer {

    background: lightgray;
    opacity:0.3;
    height: 50px;
    text-align: center;
    padding-top:20px;
}
</style>

    <!-- Styles -->
   <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>

@include ('layouts.header')

    <div class="container cont">

      <div class="col-xs-12 col-md-8">
     
        @yield('content')
        </div>
        <div class="col-xs-6 col-sm-4"><br>


        <br>
        
        @if (Auth::check())

              <div class="panel panel-default">
                <div class="panel-heading">{{ __('Edit profile') }}</div>
                <div class="panel-body">
                      <li><a href="{{ url('profile')}}">{{ __('All users')}}</a></li>

                      <li><a href="{{ url('profile/edit')}}">{{ __('Edit my profile') }}</a></li>

                      <li><a href="{{ url('profile')}}/{{auth()->user()->id}}">{{ __('My profile')}}</a></li>

                    <li><a href="{{ url('messages')}}">{{ __('My messages')}}</a></li>

                    <li><a href="{{ url('profile/photo')}}">{{ __('Upload photo')}}</a></li>

                    <li><a href="{{ url('profiles/blocked')}}">{{ __('Blocked users')}}</a></li>
                </div>
                </div>
            @endif
                             <div class="panel panel-default">
                <div class="panel-heading">Admin section</div>
                <div class="panel-body">
                    <li><a href="{{ url('article')}}">Create Article</a></li>

                    <li><a href="{{ url('article/edit/all')}}">Edit Articles</a></li>

                    <li><a href="{{ url('tag/create')}}">Create tag</a></li>

                    <li><a href="{{ url('tag/edit')}}">Edit tag</a></li>

                     

                </div>
                </div>

                                             <div class="panel panel-default">
                <div class="panel-heading">{{ __('Articles')}}</div>
                <div class="panel-body">
                                    <li><a href="{{ url('article/all')}}">All Articles</a></li>

                  @foreach($tags as $tag)

                    <li><a href="{{ url('article/tag')}}/{{$tag}}">{{$tag}}</a></li>
                  @endforeach
                </div>
                </div>
        </div>
          

    </div>

    <!-- footer   -->

    <div class="container footer">Dating site 2017, damages is observed.</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
