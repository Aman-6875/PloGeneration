@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All User</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/users">Add User</a></li>
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

                        <h4 class="card-title">User Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin-Access</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                          @foreach ($data as $user)
                            <tr>
                                <input type="hidden" class="serdelet_val" value={{$user->id}}>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if ($user->is_admin==1)
                                    <button type="button" class="btn btn-success waves-effect waves-light">
                                        <i class="bx bx-check-double font-size-16 align-middle me-2"></i> Approved
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-dark waves-effect waves-light">
                                        <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Pending
                                    </button>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle show" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Action <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu " aria-labelledby="btnGroupVerticalDrop1" style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 36.6667px);" data-popper-placement="bottom-start">
                                            @if ($user->is_admin==1)
                                            <a class="dropdown-item" href="/admin-remove/{{$user->id}}">Remove Approval</a>
                                            @else
                                            <a class="dropdown-item" href="/admin-add/{{$user->id}}">Approve Admin</a>
                                            @endif
                                            <a class="dropdown-item" href="/edit-user/{{$user->id}}">Edit</a>
                                            <a class="dropdown-item delete"  href="#">Delete</a>
                                        </div>
                                    </div>


                                </td>


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
                        url: '/user-delete/'+data,
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
