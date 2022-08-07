@extends('admin.admin_master')
@section('admin_content')
    <div class="container py-12">
        <div class="row py-5">
            <div class="col-lg-10 m-auto">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add Home Slider </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('storeSlider') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" id="description">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group ">
                                <label for="" class="form-label ">Image </label>
                                <input type="file" name="image" class="form-control " id="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
