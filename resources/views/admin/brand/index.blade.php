@extends('admin.admin_master')
@section('admin_content')



    <div class="container py-12">
        <!-- All Category Show Part Is Here -->
        <div class="row py-5">
{{--
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif   for bootstarp alert--}}

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>All Brands</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                            $i = 1;
                        @endphp // For Normal Index // --}}
                            @foreach ($brands as $brand)
                                <tr>
                                    {{-- <th scope="row">{{ $i++ }}</th> // For Normal Index // --}}
                                    <th scope="row">{{ $brands->firstItem() + $loop->index }}</th>
                                    {{-- For Paginate Index --}}
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img src="{{asset($brand->brand_image)}}" height="50px" width="70px" alt=""></td>
                                    <td>{{ $brand->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('brand/delete/'.$brand->id)}}" onclick="return confirm('Are you sure to delete !!')" class="btn btn-danger">Delete</a>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $brands->links() }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Brand</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{route('storebrand')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Brand name</label>
                                <input type="text" name="brand_name" class="form-control" id="brand_name">
                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group ">
                                <label for="" class="form-label ">Brand Image </label>
                                <input type="file" name="brand_image" class="form-control py-2 border-1 border-dark" id="brand_image">
                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="" class="btn btn-primary">Add Brand</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
