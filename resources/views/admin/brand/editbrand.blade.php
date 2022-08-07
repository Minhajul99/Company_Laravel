@extends('admin.admin_master')
@section('admin_content')



    <div class="container py-12">
        <div class="row">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Brands</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{route('brandUpdate',$brands->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_img" value="{{$brands->brand_image}}">
                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Brand name</label>
                                <input type="text" name="brand_name" class="form-control" id="brand_name" value="{{$brands->brand_name}}">
                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group ">
                                <img src="{{asset($brands->brand_image)}}" width="80px" height="50px" alt="">
                            </div>

                            <div class="mb-3 form-group ">
                                <label for="" class="form-label ">Brand Image </label>
                                <input type="file" name="brand_image" class="form-control py-2 border-1 border-dark" id="brand_image" value="{{$brands->brand_image}}">
                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
