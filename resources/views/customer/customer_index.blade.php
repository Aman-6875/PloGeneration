@extends('layout')

@section('content')
<div class="page-content">




    <div class="modal-content" style="width: 100%">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Customer Create</h5>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
          <span id="form_result"></span>
          <form id="sample_form" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name">
                          <input type="hidden" class="form-control" id="admin_id" name="admin_id" value="{{Auth::user()->id}}">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Gender</label>
                        <div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="gender" name="gender"  value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                          </div>
                        </div>


                       </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Location</label>
                          <select class="form-control" name="location" id="location">
                              <option value="AL">Alabama</option>
                              @foreach ($country as $item)
                              <option value="{{$item->name}}">{{$item->name}}</option>
                              @endforeach

                            </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="message-text" class="col-form-label">Address</label>
                          <textarea class="form-control" id="address" name="address"></textarea>
                        </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Price</label>
                          <input type="text" class="form-control" id="price" name="price">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Profession</label>
                          <select class="form-control" name="profession" id="profession">
                              <option value="Developer">Developer</option>
                              <option value="Designer">Designer</option>
                              <option value="Ceo">Ceo</option>
                              <option value="Cto">Cto</option>
                              <option value="Entrepreneur">Entrepreneur</option>
                              <option value="Startup owner">Startup owner</option>
                              <option value="Undefined">Undefined</option>
                              <option value="Marketer">Marketer</option>
                              <option value="Seo specilist">Seo specilist</option>
                              <option value="Data scientist">Data scientist</option>
                            </select>
                       </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Company Name</label>
                          <input type="text" class="form-control" id="company_name" name="company_name">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">CompanyCategory</label>
                          <input type="text" class="form-control" id="company_category" name="company_category">
                      </div>
                  </div>


              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Company Website</label>
                          <input type="text" class="form-control" id="company_website" name="company_website">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Device</label>
                          <select class="form-control" name="device" id="device">
                            <option value="Linux">Linux</option>
                            <option value="Mac">Mac</option>
                            <option value="Windows">Windows</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Facebook Link</label>
                          <input type="text" class="form-control" id="facebook_link" name="facebook_link">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Google Link</label>
                          <input type="text" class="form-control" id="google_link" name="google_link">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">LinkedIn Link</label>
                          <input type="text" class="form-control" id="linked_in_link" name="linked_in_link">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Twitter Link</label>
                          <input type="text" class="form-control" id="twitter_link" name="twitter_link">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Instagram Link</label>
                          <input type="text" class="form-control" id="instagram_link" name="instagram_link">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">GitHub Link</label>
                          <input type="text" class="form-control" id="github_link" name="github_link">
                      </div>
                  </div>

              </div>
              <div class="row">

                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Custmer Image</label>
                          <input type="file" class="form-control" id="bg_image" name="bg_image">
                      </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="hidden_id" id="hidden_id" />
                  <input type="submit" name="action" id="action" class="btn btn-primary" value="Add"/>
              </div>

          </form>
        </div>

      </div>


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Customer</h4>

                    {{-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Customers</a></li>
                        </ol>
                    </div> --}}

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

                                <th>Name</th>
                                <th>Gender</th>
                                <th>Profession</th>
                                <th>Company Name</th>
                                <th>Company Category</th>
                                <th>Company Website</th>
                                <th>Price</th>
                                <th>Device</th>
                                <th>Location</th>
                                <th>Address</th>
                                <th>Facebook</th>
                                <th>Google</th>
                                <th>LinkedIn</th>
                                <th>Twitter</th>
                                <th>Github</th>
                                <th>Instagram</th>
                                <th>Customer Image</th>
                                <th>Listed By</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                                <td></td>

                            <tbody>

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


<!-- modal -->

{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 800px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <span id="form_result"></span>
        <form id="sample_form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <input type="hidden" class="form-control" id="admin_id" name="admin_id" value="{{Auth::user()->id}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Location</label>
                        <select class="js-example-basic-single form-group" name="location" id="location">
                            <option value="AL">Alabama</option>
                            @foreach ($country as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach

                          </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Address</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Profession</label>
                        <select class="form-control" name="profession" id="profession">
                            <option value="Developer">Developer</option>
                            <option value="Designer">Designer</option>
                            <option value="Ceo">Ceo</option>
                            <option value="Cto">Cto</option>
                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Startup owner">Startup owner</option>
                            <option value="Undefined">Undefined</option>
                            <option value="Marketer">Marketer</option>
                            <option value="Seo specilist">Seo specilist</option>
                            <option value="Data scientist">Data scientist</option>
                          </select>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">CompanyCategory</label>
                        <input type="text" class="form-control" id="company_category" name="company_category">
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Company Website</label>
                        <input type="text" class="form-control" id="company_website" name="company_website">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Device</label>
                        <input type="text" class="form-control" id="device" name="device">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Facebook Link</label>
                        <input type="text" class="form-control" id="facebook_link" name="facebook_link">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Google Link</label>
                        <input type="text" class="form-control" id="google_link" name="google_link">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">LinkedIn Link</label>
                        <input type="text" class="form-control" id="linked_in_link" name="linked_in_link">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Twitter Link</label>
                        <input type="text" class="form-control" id="twitter_link" name="twitter_link">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Instagram Link</label>
                        <input type="text" class="form-control" id="instagram_link" name="instagram_link">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">GitHub Link</label>
                        <input type="text" class="form-control" id="github_link" name="github_link">
                    </div>
                </div>

            </div>
            <div class="row">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Custmer Image</label>
                        <input type="file" class="form-control" id="bg_image" name="bg_image">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" name="hidden_id" id="hidden_id" />
                <input type="submit" name="action" id="action" class="btn btn-primary" value="Add"/>
            </div>

        </form>
      </div>

    </div>
  </div>
</div> --}}
<!-- end modal-->
<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
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


<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
            url: "{{ route('customer-add.index') }}",
            },
            columns:[


            {
                data: 'name',
                name: 'Name'
            },
            {
                data: 'gender',
                name: 'Gender'
            },
            {
                data: 'profession',
                name: 'Profession'
            },
            {
                data: 'company_name',
                name: 'Company Name'
            },
            {
                data: 'company_category',
                name: 'Company Category'
            },
            {
                data: 'company_website',
                name: 'Company Website'
            },
            {
                data: 'price',
                name: 'Price'
            },
            {
                data: 'device',
                name: 'Device'
            },
            {
                data: 'location',
                name: 'Location'
            },
            {
                data: 'address',
                name: 'Address'
            },
            {
                data: 'facebook_link',
                name: 'Facebook Link'
            },
            {
                data: 'google_link',
                name: 'Google'
            },
            {
                data: 'linked_in_link',
                name: 'LinkedIn'
            },
            {
                data: 'twitter_link',
                name: 'Twitter'
            },
            {
                data: 'github_link',
                name: 'Github'
            },
            {
                data: 'instagram_link',
                name: 'Instagram'
            },
            {
                data: 'image',
                name: 'image',
                render: function(data, type, full, meta){
                return "<img src=/public/images/customer/" + data + " width='150px' height='100px'/>";
                },
                orderable: false
            },
            {
                data: 'admin',
                name: 'Listed By',
                render: function(data, type, full, meta){
                return "<img src=/public/images/user/" + data + " width='150px' height='100px'/>";
                },
                orderable: false
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });

        $('#sample_form').on('submit',function(event){
            event.preventDefault();
            if($('#action').val()=='Add')
            {
                console.log("action");
                $.ajax({
                    url:"{{route('customer-add.store')}}",
                    method:"POST",
                    data: new FormData(this),
                    contentType: false,
                    cache:false,
                    processData:false,
                    dataType:"json",
                    success:function(data)
                    {
                        console.log(data);
                        var html = '';
                        if(data.errors){
                            html = '<div class="alert alert-danger">';
                            for( var count= 0; count<data.errors.length;count++){
                                html += '<p>' + data.errors[count] +'</p>';
                            }
                            html += '</div>';
                        }
                        if(data.success){
                            html = '<div class="alert alert-success">'+data.success+'</div>';
                            $('#sample_form')[0].reset();
                            $('#datatable').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                })
            }
        });
         var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"customer-add/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#datatable').DataTable().ajax.reload();
    }, 2000);
   }
  })
 });
    });

</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
