@extends('layouts.product')
@section('content')

@section('titletext')
<a class="navbar-brand" href="#">Product List</a>
@endsection

@section('navbtn')
<a class="nav-link active" aria-current="page" href="{{url('add_product')}}">Add Product</a>
@endsection

@if($massege=Session::get('delete'))
    <div class="alert alert-primary text-center">{{$massege}}</div>
    @endif
    <table class="table table-bordered ">
    <thead class="thead-dark">
        <tr class="text-center">
        <th scope="col">Id</th>
        <th scope="col">Product Title</th>
        <th scope="col">Photo</th>
        <th scope="col">Details</th>
        <th scope="col" colspan="3" >Action</th>
        </tr>
    </thead>
    @if($product)
    <tbody>
    
        @foreach($product as $data)
        <tr class="align-middle">
        <th class="text-center">{{++$i}}</th>
        <td class="text-center">{{$data->title}}</td>
        <td class="text-center"><img style="width: 70px;" class="img-thumbnail " src="{{asset('uploads/'.$data->image)}}"></td>
        <td>{{ Str::words($data->details, 15, $end='.....') }}</td>
        <td class="text-center"><a class="btn btn-sm btn-primary" href="{{route('show',$data->id)}}">Show</a></td>
        <td class="text-center"><a class="btn btn-sm btn-secondary" href="{{route('edit',$data->id)}}">Edit</a></td>
        <td class="text-center"><a class="btn btn-sm btn-warning" href="{{route('delete',$data->id)}}">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
    @endif
    </table>
   <div class="d-flex">
       <div class="m-auto">
       {!! $product->links() !!}
       </div>
   </div>
    @endsection
    

   




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>