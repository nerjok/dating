@extends('layouts.app')

@section('content')

<div class="panel-heading">Registration Confirmed</div>
<div class="panel-body">
Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a>
</div>

@endsection