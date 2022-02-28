@extends('layouts.product')
@section('content')

@section('navbtn')
<a class="nav-link active btn btn-sm btn-secondary text-light" aria-current="page" href="{{url('index')}}">Back</a>
@endsection
<div class="card m-auto" style="width: 22rem;">
  <img src="{{asset('uploads/'.$post->image)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h3>{{$post->title}}</h3>
    <p class="text-justify">{{$post->details}}</p>
    
  </div>
</div>

@endsection