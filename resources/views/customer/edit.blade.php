@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit Customer</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/customer-add">All Customers</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Customer Information</h4>

                    <form action="/update-customer" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.includes.message')
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="hidden" name="admin_id" class="form-control" id="horizontal-firstname-input" value="{{$customer->admin_id}}">
                              <input type="hidden" name="id" class="form-control" id="horizontal-firstname-input" value="{{$customer->id}}">
                              <input type="text" name="name" class="form-control" id="horizontal-firstname-input" value="{{$customer->name}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">

                                    <div>
                                        <div class="form-check mb-3">
                                          <input class="form-check-input" type="radio" name="gender" id="gender" @if ($customer->gender=="male")checked @endif value="male">
                                          <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check mb-3">
                                          <input class="form-check-input" type="radio" id="gender" name="gender" @if ($customer->gender=="female")checked @endif  value="female">
                                          <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>




                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="location">
                                    @foreach ($country as $item)
                                    <option @if ($customer->location==$item->name)selected @endif value="{{$item->name}}">{{$item->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="address" class="form-control">{{$customer->address}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" value="{{$customer->price}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Profession</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="profession">
                                    <option @if ($customer->profession=="Developer")selected @endif value="Developer">Developer</option>
                                    <option @if ($customer->profession=="Designer")selected @endif value="Designer">Designer</option>
                                    <option @if ($customer->profession=="Ceo")selected @endif value="Ceo">Ceo</option>
                                    <option @if ($customer->profession=="Cto")selected @endif value="Cto">Cto</option>
                                    <option @if ($customer->profession=="Entrepreneur")selected @endif value="Entrepreneur">Entrepreneur</option>
                                    <option @if ($customer->profession=="Startup owner")selected @endif value="Startup owner">Startup owner</option>
                                    <option @if ($customer->profession=="Undefined")selected @endif value="Undefined">Undefined</option>
                                    <option @if ($customer->profession=="Marketer")selected @endif value="Marketer">Marketer</option>
                                    <option @if ($customer->profession=="Seo specilist")selected @endif value="Seo specilist">Seo specilist</option>
                                    <option @if ($customer->profession=="Data scientist")selected @endif value="Data scientist">Data scientist</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="company_name" class="form-control" value="{{$customer->company_name}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Company Website</label>
                            <div class="col-sm-9">
                                <input type="text" name="company_website" class="form-control" value="{{$customer->company_website}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Company Category</label>
                            <div class="col-sm-9">
                                <input type="text" name="company_category" class="form-control" value="{{$customer->company_category}}">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Device</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="device">
                                    <option @if ($customer->device=="Linux")selected @endif value="Linux">Linux</option>
                                    <option @if ($customer->device=="Mac")selected @endif value="Mac">Mac</option>
                                    <option @if ($customer->device=="Windows")selected @endif value="Windows">Windows</option>
                                   </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Faceboot Account</label>
                            <div class="col-sm-9">
                                <input type="text" name="facebook_link" class="form-control" value="{{$customer->facebook_link}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Google Account</label>
                            <div class="col-sm-9">
                                <input type="text" name="google_link" class="form-control" value="{{$customer->google_link}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">LinkedIn Account</label>
                            <div class="col-sm-9">
                                <input type="text" name="linked_in_link" class="form-control" value="{{$customer->linked_in_link}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Twitter Account</label>
                            <div class="col-sm-9">
                                <input type="text" name="twitter_link" class="form-control" value="{{$customer->twitter_link}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Instagram Account</label>
                            <div class="col-sm-9">
                                <input type="text" name="instagram_link" class="form-control" value="{{$customer->instagram_link}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Github Account</label>
                            <div class="col-sm-9">
                                <input type="text" name="github_link" class="form-control" value="{{$customer->github_link}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Customer Image</label>
                            <div class="col-sm-6">
                                <input type="file" name="bg_image" class="form-control" id="horizontal-email-input">
                            </div>
                            <div class="col-sm-3">
                                <img src="{{ asset('/public/images/customer/' . $customer->image) }}"
                                class="img-responsive" width="100" height="50">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update</button>
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
