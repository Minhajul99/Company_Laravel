@extends('admin.admin_master')
@section('admin_content')
    <div class="container py-12">
        <div class="row py-5">
            <div class="col-lg-10 m-auto">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Update Contact </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateContact', $contacts->id) }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    value="{{ $contacts->address }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    value="{{ $contacts->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    value="{{ $contacts->phone }}">
                                @error('phone')
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
