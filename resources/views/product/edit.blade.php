@extends('layouts.product')
@section('content')
@section('titletext')
<a class="navbar-brand" href="#">Product List</a>
@endsection

@section('navbtn')
<a class="nav-link active" aria-current="page" href="{{url('index')}}">Product List</a>
@endsection

<div class="container">
    <div class="row col-sm-6 col-m-12 col-lg-6  m-auto">
    @if($massege=Session::get('status'))
    <div class="alert alert-primary text-center">{{$massege}}</div>
    @endif
    </div>
    <div class="row ">

    <div class="col-sm-6 col-m-12 col-lg-6  m-auto">
        <div class="card border p-3">
        <form action="{{route('update',$editPost->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Product Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$editPost->title}}">
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea name="details" class="form-control"  id="details" cols="30" rows="6">{{$editPost->details}}</textarea>
            </div>
            <div class="mb-3">
                <label for="poster" class="form-label"></label>
                <input type="file" class="form-control-file" id="poster" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
    </div>
    </div>
</div>

@endsection