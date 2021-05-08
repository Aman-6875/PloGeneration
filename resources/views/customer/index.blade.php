@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Customer</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/create-customer">Add Customers</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Customer Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Profession</th>
                                <th>Company Name</th>
                                <th>Company Category</th>
                                <th>Price</th>
                                <th>Device</th>
                                <th>Location</th>
                                <th>Address</th>
                                <th>Customer Image</th>
                                <th>Listed By</th>

                            </tr>
                            </thead>


                            <tbody>
                          @foreach ($customers as $customer)
                            <tr>
                                <input type="hidden" class="serdelet_val" value={{$customer->id}}>
                                <td></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle show" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Action <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu " aria-labelledby="btnGroupVerticalDrop1" style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 36.6667px);" data-popper-placement="bottom-start">
                                            <a class="dropdown-item" href="/edit-customer/{{$customer->id}}">Edit</a>
                                            <a class="dropdown-item delete"  href="#">Delete</a>
                                        </div>
                                    </div>


                                </td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->gender}}</td>
                                <td>{{$customer->profession}}</td>
                                <td>{{$customer->company_name}}</td>
                                <td>{{$customer->company_category}}</td>
                                <td>{{$customer->price}}</td>
                                <td>{{$customer->device}}</td>
                                <td>{{$customer->location}}</td>
                                <td>{{$customer->address}}</td>
                                {{-- <td><img src="/public/images/customer/{{$customer->image}}"style="
                                    height: 100px;
                                    width: 150px;
                                "></td> --}}
                                <td><img src="/images/customer/{{$customer->image}}"style="
                                    height: 100px;
                                    width: 150px;
                                "></td>
                                {{-- <td><img src="/public/images/user/{{$customer->admin}}"style="
                                    height: 80px;
                                    width: 80px;
                                "></td> --}}
                                <td><img src="/images/user/{{$customer->admin}}"style="
                                    height: 80px;
                                    width: 80px;
                                "></td>



                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

<script>



$(document).ready(function() {
    $('.delete').click(function (e){
        e.preventDefault();
        var data = $(this).closest("tr").find(".serdelet_val").val();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/customer-delete/'+data,
                        data: {data},
                        success: function(response){
                            //location.reload();
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            .then((result)=>{
                                location.reload();
                            })

                        }
                    });
                }
            })
    })
} );


</script>
@endsection
