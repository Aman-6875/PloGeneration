@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit User</h4>
                    @if (Auth::user()->user_type==1)
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/users">All User</a></li>
                        </ol>
                    </div>
                    @endif


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">User Information</h4>

                    <form action="/update-user" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @if (count($errors) > 0)
                            <div class = "alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        @include('admin.includes.message')
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="hidden" name="id" class="form-control" id="horizontal-firstname-input" value="{{$user->id}}">
                              <input type="text" name="name" class="form-control" id="horizontal-firstname-input" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="horizontal-email-input" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">User Image</label>
                            <div class="col-sm-6">
                                <input type="file" name="bg_image" class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="col-sm-3">
                                <img src="{{ asset('/public/images/user/' . $user->image) }}"
                                class="img-responsive" width="100" height="50">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Update Password</label>
                            <div class="col-sm-9">
                              <input type="password" name="password" class="form-control" id="horizontal-password-input">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">ADD</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

@endsection
