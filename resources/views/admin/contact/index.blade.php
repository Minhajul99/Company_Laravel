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
                        <h3 class="d-inline">Contact Page</h3>
                        <a href="{{ route('addContact') }}" class="btn btn-info float-right">Add Contact</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">Sl</th>
                                <th scope="col" width="25%">Address</th>
                                <th scope="col" width="30%">Email</th>
                                <th scope="col" width="20%">Phone</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                        @endphp
                        {{-- // For Normal Index // --}}
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    {{-- // For Normal Index // --}}
                                    {{-- <th scope="row">{{ $abouts->firstItem() + $loop->index }}</th> --}}
                                    {{-- For Paginate Index --}}
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>
                                        <a href="{{url('contact/edit/'.$contact->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('contact/delete/'.$contact->id)}}" onclick="return confirm('Are you sure to delete !!')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- {{ $sliders->links() }} --}}
                </div>
            </div>

        </div>
    </div>
@endsection
