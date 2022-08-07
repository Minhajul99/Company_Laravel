@extends('admin.admin_master')
@section('admin_content')
    <div class="container py-12">
        <!-- All Category Show Part Is Here -->
        <div class="row py-5">

            @if (session('success'))
            <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                <strong>{{ session('success') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-inline">Admin Messages</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">Sl</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col" width="20%">Email</th>
                                <th scope="col" width="15%">Subject</th>
                                <th scope="col" width="30%">Message</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                        @endphp
                            @foreach ($messages as $message)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->massage }}</td>
                                    <td>

                                        <a href="{{url('message/delete/'.$message->id)}}" onclick="return confirm('Are you sure to delete !!')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
