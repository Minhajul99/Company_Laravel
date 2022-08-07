@extends('admin.admin_master')
@section('admin_content')
    <div class="container py-12">
        <div class="row">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Slider</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('sliderUpdate',$slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_img" value="{{ $slider->image }}">
                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ $slider->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" id="description"
                                    value="{{ $slider->description }}">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group ">
                                <img src="{{ asset($slider->image) }}" width="80px" height="50px" alt="">
                            </div>

                            <div class="mb-3 form-group ">
                                <label for="" class="form-label ">Image </label>
                                <input type="file" name="image" class="form-control py-2 border-1 border-dark"
                                    id="image" value="{{ $slider->image }}">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="" class="btn btn-primary">Update Slider</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
