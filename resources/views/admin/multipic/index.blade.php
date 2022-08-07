@extends('admin.admin_master')
@section('admin_content')

    <div class="container py-12">
        <!-- All Category Show Part Is Here -->
        <div class="row py-5">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-md-8">
               <div class="card-group">
                @foreach ($images as $image)
                <div class="col-md-4">
                 <div class="card">
                     <img src="{{asset($image->multi_pic)}}" alt="">
                 </div>
                </div>
             @endforeach
               </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Multi Picture</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{route('storeImg')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-group ">
                                <label for="" class="form-label ">Multi Picture  </label>
                                <input type="file" name="multipic[]" class="form-control py-2 border-1 border-dark" id="multipic" multiple>
                                @error('multipic')
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
