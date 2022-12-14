@extends('admin.admin_master')

@section('admin_content')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        <form class="form-pill">
           @csrf
            <div class="form-group">
                <label for="exampleFormControlPassword3">Current Password</label>
                <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Current Password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary btn-default">Save Change</button>
        </form>
    </div>
</div>
@endsection
