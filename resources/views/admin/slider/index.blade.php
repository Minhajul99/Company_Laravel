@extends('admin.admin_master')
@section('admin_content')
    <div class="container py-12">
        <!-- All Category Show Part Is Here -->
        <div class="row py-5">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-inline">Home Slider</h3>
                        <a href="{{ route('addSlider') }}" class="btn btn-info float-right">Add Slider</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">Sl</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="30%">Description</th>
                                <th scope="col" width="15%">Image</th>
                                <th scope="col" width="15%">Created at</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                            $i = 1;
                        @endphp // For Normal Index // --}}
                            @foreach ($sliders as $slider)
                                <tr>
                                    {{-- <th scope="row">{{ $i++ }}</th> // For Normal Index // --}}
                                    <th scope="row">{{ $sliders->firstItem() + $loop->index }}</th>
                                    {{-- For Paginate Index --}}
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td><img src="{{ asset($slider->image) }}" height="50px" width="70px" alt="">
                                    </td>
                                    <td>{{ $slider->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{url('slider/edit/'.$slider->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('slider/delete/'.$slider->id)}}" onclick="return confirm('Are you sure to delete !!')" class="btn btn-danger">Delete</a>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $sliders->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
