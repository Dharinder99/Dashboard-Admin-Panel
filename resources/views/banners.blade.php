@extends('layouts.master')
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- =======================
    ======================================= -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            {!! Form::open(['url' => '/banners', 'method' => 'post', 'enctype' =>
                            'multipart/form-data']) !!}
                            <?php for ($i = 0; $i <= 3; $i++) { ?>

                            <div class="col-lg-12" id="filter_{{$i}}" @if($i!=0) style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-lg-2 form-group">
                                        {!! Form::label('search_in', 'Search In') !!}
                                        <select name="search_in[{{$i}}]" id="search_in_{{$i}}" data-id="{{$i}}"
                                            class="search_in js-states form-control select2-selection__rendered"
                                            tabindex="-1" style="width: 100%">

                                            <option value="banner_name" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='banner_name' )){{{ "selected" }}} @endif>
                                                Banner Name</option>

                                            <option value="banner_tagline" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='banner_tagline' )){{{ "selected" }}}
                                                @endif>Banner Tagline</option>

                    <option value="created_datetime" @if(isset($inputValue) &&
                    ($inputValue['search_in'][$i]=='created_datetime' )){{{ "selected" }}} @endif>
                                                Date</option>

                                            {{-- <option value="gender_flag" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='gender_flag' )){{{ "selected" }}}
                                                @endif>Gender</option> --}}

                                            {{-- <option value="block_flag" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='block_flag' )){{{ "selected" }}} @endif>
                                                Is Verified </option> --}}
                                            {{-- <option value="is_verified" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='is_verified' )){{{ "selected" }}}
                                                @endif>Is Active </option> --}}
                                            {{-- <option value="create_datetime" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='create_datetime' )){{{ "selected" }}}
                                                @endif>Registered On</option> --}}

                                        </select>
                                    </div>

                                    <div class="col-lg-2 form-group form-group-search">
                                        {!! Form::label('search_type', 'Search Type') !!}
                                        <select name="search_type[{{$i}}]" id="search_type_{{$i}}"
                                            class="js-states form-control select2-selection__rendered" tabindex="-1"
                                            style="width: 100%">
                                            <option value="contains" @if(isset($inputValue) &&
                                                ($searchType[$i]=='contains' )){{{ "selected" }}} @endif>Contains
                                            </option>
                                            <option value="begins_with" @if(isset($inputValue) &&
                                                ($searchType[$i]=='begins_with' )){{{ "selected" }}} @endif>Begins With
                                            </option>
                                            <option value="ends_with" @if(isset($inputValue) &&
                                                ($searchType[$i]=='ends_with' )){{{ "selected" }}} @endif>Ends With
                                            </option>
                                            <option value="exact_match" @if(isset($inputValue) &&
                                                ($searchType[$i]=='exact_match' )){{{ "selected" }}} @endif>Exact Match
                                            </option>
                                        </select>
                                    </div>

         <div class="col-lg-3 form-group form-group-search">
                <span id="suggestion_text_span_{{$i}}">
                                {!! Form::label('suggestion_text', 'Enter Text') !!}
                                            <input type="text" name="suggestion_text[{{$i}}]" value="<?php if (isset($inputValue)) {
                                            echo $inputValue['suggestion_text'][$i];
                                            } ?>" class='form-control suggestion_text{{$i}}'
                                                id='suggestion_venue_{{ $i }}' onblur='trim(this)' maxlength='255'
                                                autocomplete='off'>
                                            <span id="display_suggestion_venue_list"
                                                style="position:absolute;margin-top:-1px;display:none;overflow:hidden;background-color:white; z-index:9; width:97%"></span>
                                        </span>

                                        <span id="block_flag_span_{{$i}}" style="display:none;">
                                            {!! Form::label('Block', 'Select') !!}
                                            <select name="block_flag[{{$i}}]" id="block_flag_{{$i}}"
                                                class="js-states form-control" tabindex="-1"
                                                style="width:100%; height:38px;">
                                                <option value="Any">Any</option>
                                                <option value="1" @if(isset($inputValue) &&
                                                    ($inputValue['block_flag'][$i]=='1' )){{{ "selected" }}} @endif>Yes
                                                </option>
                                                <option value="0" @if(isset($inputValue) &&
                                                    ($inputValue['block_flag'][$i]=='0' )){{{ "selected" }}} @endif>No
                                                </option>
                                            </select>
                                        </span>

                                        <span id="date_range_span_{{$i}}" style="display: none; width: 100%;">
                                            {!! Form::label('date_range', 'Date Range') !!} (m/d/Y)
                                            <input type="text"
                                                class="form-control date-range-piker-field date_range{{$i}}"
                                                name="datefilter[{{$i}}]" id="datepicker-range"
                                                value="<?php if (isset($inputValue)) {
                                                                                                          echo $inputValue['datefilter'][$i];
                                                                                                                                                                } ?>"
                                                readonly required>
                                        </span>
                                    </div>
                                    <div class="col-lg-2 form-group form-group-search mt-2">
                                        @if($i == 0)
        <button type="button"
                            class="btn btn-primary btn-addon add-filter criteria-btn mt-3"
                                        id="{{$i}}"><i class="fa fa-plus fa-lg"
                                                style="margin-right: 4px; font-weight: bold;">
                                            </i>Criteria</button>

                                        @else

                        <button type="button" class="btn btn-danger remove-filter criteria-btn mt-3"
                            id="{{$i}}"><i class="fa fa-times fa-lg"
                            style="margin-right: 4px; font-weight: bold;"></i> Criteria</button>
                                        @endif
                                    </div>

                                    @if($i==0)
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-lg-1 form-group form-group-search" style="padding: 0;">
                                        {!! Form::label('Limit', 'Limit') !!}
                                        <select name="limit_flag" id="limit_flag" class="js-states form-control"
                                            tabindex="-1">
                                            <option value="50" @if(isset($inputValue) && ($inputValue['limit_flag']==50)
                                                || isset($default_limit)){{{ "selected" }}} @endif>50</option>
                                            <option value="100" @if(isset($inputValue) &&
                                                ($inputValue['limit_flag']==100)){{{ "selected" }}} @endif>100</option>
                                            <option value="200" @if(isset($inputValue) &&
                                                ($inputValue['limit_flag']==200)){{{ "selected" }}} @endif>200</option>
                                            <option value="500" @if(isset($inputValue) &&
                                                ($inputValue['limit_flag']==500)){{{ "selected" }}} @endif>500</option>
                                            <option value="1000" @if(isset($inputValue) &&
                                                ($inputValue['limit_flag']==1000)){{{ "selected" }}} @endif>1000
                                            </option>
                                            <option value="2000" @if(isset($inputValue) &&
                                                ($inputValue['limit_flag']==2000)){{{ "selected" }}} @endif>2000
                                            </option>
                                            {{-- <option value="" @if(isset($inputValue) &&
                                                ($inputValue['limit_flag']=="" )){{{ "selected" }}} @endif>All</option>
                                            --}}
                                        </select>
                                    </div>

            <div class="col-lg-2 form-group form-group-search mt-2">
                                        <button type="submit"
                                            class="btn btn-primary btn-addon m-y-sm seach-filter-btn mt-3"
                                            style="width:130px;"><i class="fa fa-search" style="margin-right: 4px;"></i>
                                            Filter/Apply</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <?php } ?>

                            <input type="hidden" name="divToShow" id="divToShow" value="{{ $divToShow }}">
                            <input type="hidden" name="formCount" id="formCount" value="{{ $formCount }}">
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Banner Table</h4>


                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class=" d-flex justify-content-end ">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#userFormModal"
                        id="openFormButton"> <i class="fa fa-plus fa-lg" style="margin-right: 4px; font-weight: bold;">
                        </i>Add New</button>

                </div>
                <div class="card">
                    <div class="card-header">

                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 text-center">
                            <thead>
                                <tr class="text-center">

                                    <th class="text-center">Banner Image</th>
                                    <th class="text-center">Banner Name</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>

                            </thead>
                             <tbody>

                                @foreach($userdata as $item)
                                <tr>
                                   <td>
                                        <img src="assets/images/users/avatar-2.jpg" alt=""
                                            class="avatar-sm rounded-circle me-2">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target=".bs-example-modal-center"></a>
                                    </td>

                                    <td>{{$item->banner_name}}</td>
                                    <td>{{$item->created_datetime}}</td>
                                    <td>{{$item->is_active}}</td>

                                    <td style="text-align: center;">
                                        <div class="dropdown">

                                        <button class="btn btn-light dropdown-toggle" type="button"
                                                id="dropdownMenu-{{ $item->id }}" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"
                                                style="border: none; background: transparent;">
                                                <i class="fas fa-ellipsis-v"> </i>
                                            </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu-{{ $item->id }}">

                                                <!-- "View User" with eye icon -->
                                                <a id='editbutton' class="dropdown-item view-user-details"
                                                    data-id="{{ $item->id }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editbannerFormModal">
                                                    <i class="fas fa-eye green-icon" style="color: green"></i>&nbsp;
                                                    &nbsp;Edit</a>

                                                <!-- "Delete User" with trash icon -->
                                                <a id="delete-user" class="dropdown-item edit delete-user"
                                                    title="Delete" data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                    href="#delete-user-modal" class="dropdown-item delete-user"><i
                                                        class="fas fa-trash-alt red-icon" style="color: red"></i>&nbsp;
                                                    &nbsp;Delete Banner</a>

                                                <a href="#" class="dropdown-item view-user-details"
                                                    data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#viewUserDetails">
                                                    <i class="fas fa-eye green-icon" style="color: green"></i>&nbsp;
                                                    &nbsp;Publish/UnPublish Banner</a>

                                    </td>
                                    {{--
                                    <td>
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a id="view-user"
                                                        class="btn btn-outline-secondary btn-sm edit view-user"
                                                        title="View Profile" data-id="{{ $item->id }}"
                                                        data-bs-toggle="modal" href="#view-user-modal">
                                                        Edit </a>
                                                    <a id="delete-user"
                                                        class="btn btn-outline-secondary btn-sm edit delete-user"
                                                        title="Delete" data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                        href="#delete-user-modal">
                                                        <span>Delete Banner</span></a>
                                                </li>




                                                <li><a class="dropdown-item"
                                                        href="{{url('/deleterecord/{req}')}}">Publish/Unpublish</a></li>

                                            </ul>
                                        </div>
                                    </td> --}}

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end cardaa -->
            </div> <!-- end col -->



        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>



<!-- Add Modal -->
<div class="modal fade" id="userFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header mt-5">
                <h5 class="modal-title" id="exampleModalLabel">Upload Banner Details</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{-- <form id="userForm"> --}}
                    <form method="post" id="userForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row d-flex">
                            <div class="">
                                <label for="banner_name">Banner Name</label>

                                <span style="color: red !important; display: inline; float: none;">*</span>

                                <input type="text" id="banner_name" name="banner_name" class="form-control" required>
                            </div>


                            <div class="form-group mb-3">
                                <label for="banner_tagline">Banner Tag Line</label>
                                <input type="text" id="banner_tagline" name="banner_tagline" class="form-control">

                            </div>

                            <div class="col-6 md:col-12 my-2">
                                <label for="banner_url">Upload The Banner Image</label><span
                                    style="color: red !important; display: inline; float: none;">*</span>

                                <input type="file" id="banner_url" name="banner_url" class="form-control">

                            </div>


                        </div>
                        <button type="submit" class="btn btn-secondary">Publish</button>

                    </form>
            </div>
        </div>
    </div>
</div>


<!-- EDIT Banner -->
{{-- <div class="modal fade" id="editbannerFormModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header mt-5">
                <h5 class="modal-title" id="exampleModalLabel">Edit Banner Details</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" id="editbannerForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex">
                        <div class="">
                            <label for="edit_banner_name">Banner Name</label>

                            <span style="color: red !important; display: inline; float: none;">*</span>

                            <input type="text" id="edit_banner_name" name="edit_banner_name" class="form-control"
                                required>
                        </div>


                        <div class="form-group mb-3">
                            <label for="edit_banner_tagline">Banner Tag Line</label>
                            <input type="text" id="edit_banner_tagline" name="edit_banner_tagline" class="form-control">

                        </div>

                        <div class="col-6 md:col-12 my-2">
                            <label for="edit_banner_url">Update The Banner Image</label><span
                                style="color: red !important; display: inline; float: none;">*</span>

                            <!-- Image display area -->
                            <img id="current_banner_image" src="" alt="Current Banner Image"
                                style="width: 70px; height: auto; margin-bottom: 10px;">

                            <input type="file" id="edit_banner_url" name="edit_banner_url" class="form-control">
                        </div>



                    </div>
                    <button id="updatebutton submit" type="submit" class="btn btn-secondary">Update</button>

                </form>
            </div>
        </div>
    </div>
</div> --}}

<!-- Button to open the modal -->
{{-- <button id="openFormButton" class="btn btn-primary">Edit Banner</button> --}}

<!-- EDIT Banner Modal -->
<div class="modal fade" id="editbannerFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header mt-5">
                <h5 class="modal-title" id="exampleModalLabel">Edit Banner Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/bannerupdating" id="editbannerForm" enctype="multipart/form-data">
                    @csrf
                    {{-- @dd($banner) --}}
                    <input type="hidden" id="edit_banner_id" name="edit_banner_id" value="{{ $item->id }}">

                    <div class="row d-flex">
                        <div class="mb-3">
                            <label for="edit_banner_name">Banner Name</label>
                            <span style="color: red !important; display: inline; float: none;">*</span>
                            <input type="text" id="edit_banner_name" name="edit_banner_name" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_banner_tagline">Banner Tag Line</label>
                            <input type="text" id="edit_banner_tagline" name="edit_banner_tagline" class="form-control">
                        </div>
                        <div class="col-6 md:col-12 my-2">
                            <label for="edit_banner_url">Update The Banner Image</label>
                            <span style="color: red !important; display: inline; float: none;">*</span>
                            <!-- Image display area -->
                            <img id="current_banner_image" src="" alt="Current Banner Image"
                                style="width: 70px; height: auto; margin-bottom: 10px;">
                            <input type="file" id="edit_banner_url" name="edit_banner_url" class="form-control">
                        </div>
                    </div>

                    <button id="updatebutton" type="submit" data-id="{{ $item->id }}"
                        class="btn btn-secondary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="assets/libs/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {


        // Handle form submission via AJAX
        $(document).on('click', '#editbutton', function(e) {
            e.preventDefault();
            // console.log("form Submitted ")
            const currentId = $(this).attr('data-id');
            // console.log("openEditModal id", currentId);

            $.ajax({
                url: "/editloadbanner/" + currentId,
                type:"GET",
                // data:{id:currentId},
                success:function(data) {
                    // console.log("Result of edit", data)

                    var banner_id = data.banner_id;
                    var banner_name = data.banner_name;
                    var banner_tagline = data.banner_tagline;
                    var banner_image =data.banner_image;

                    var banner_url= "/images/" + banner_image;

                    // console.log(banner_url)
                    $('#edit_banner_id').val(banner_id);

                    $('#edit_banner_name').val(banner_name);
                    $('#edit_banner_tagline').val(banner_tagline);

                    $('#current_banner_image').attr('src', banner_url);

                    $('#edit_banner_url').val(banner_url);



                }});

                $(document).on('click', '#updatebutton', function(e) {
                    e.preventDefault();
                    // let id = $('#edit_banner_id').val();

                    // console.log($('#editbannerForm'));
                    var registerData = $('#editbannerForm')[0];
                    var formData = new FormData(registerData);
                    // console.log(formData)

                    $.ajax({
                    url: "{{route('bannerupdating') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        // Optionally reload the page or update the UI
                        window.location.reload();


                    },
                    error: function(error) {
                        console.log('Error fetching user data', error);
                    }
            }
          )  });

        });
    });


</script>

<script>
    $(document).ready(function() {
        // Open the modal when the button is clicked
        $('#openFormButton').on('click', function()
        {
            $('#userFormModal').modal('show');
        });

        // Handle form submission via AJAX
        $('#userForm').on('submit', function(e) {
            e.preventDefault();
            // console.log("form Submitted ")
            // console.log($('#userForm'));
            var registerData = $('#userForm')[0];
            var formData = new FormData(registerData);
            // console.log(formData)

            $.ajax({
                url:"{{url('save-banner')}}",
                method:"POST",
                data:formData,
                contentType:false,
                processData:false,
                success:function(response){
                    // console.log(response);
                    window.location.reload();

                    // $('#userFormModal').modal('hide');
                    // $('#userForm')[0].reset(); // Reset the form
                }
            })
        });


    });
</script>


<script>

      $(document).ready(function() {
        // Open the modal when the button is clicked
        $('#editbutton').on('click', function() {
            $('#editbannerFormModal').modal('show');
        });

        // Handle form submission via AJAX
        $('#editbannerForm').on('submit', function(e) {
            e.preventDefault();
            console.log("Form Submitted");

            var editData = $('#editbannerForm')[0];
            var editformData = new FormData(editData);

            const currentId = $(this).attr('data-id');
            console.log("openEditModal id", currentId);


            console.log("FormData Entries:");
            for (var pair of editformData.entries()) {
                console.log(pair[0]+ ': ' + pair[1]);
            }

            $.ajax({
                url: "{{route('bannerupdating') }}",
                method: "POST",
                data: editformData,
                contentType: false,
                processData: false,
                success: function(response) {

                    // Optionally reload the page or update the UI
                    // window.location.reload();

                    // Optionally hide the modal and reset the form
                    // $('#editbannerFormModal').modal('hide');
                    // $('#editbannerForm')[0].reset();
                    if (response.success) {
                    alert(response.message);
                    window.location.href = '/banners'; // Redirect to the banners page or any other desired URL
                } else {
                    alert(response.message);
                }
                },
                error: function(error) {
                    console.log('Error fetching user data', error);
                }
            });
        });

        // Setup CSRF token for AJAX requests (for Laravel)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

<script>
    $(document).ready(function () {

$(document).on('click' ,'#view-user', function(){
    var id = $(this).attr('data-id');
// alert(id);
    $('#user_id_for_view').val(id);
});

 $(document).on('click' , '#ViewBtn' , function(){
    var id = $('#user_id_for_view').val()
  if (id!='') {
      $.ajax({
        type: 'GET',
            data: {
                'id':id
            },
            url: "{{url('/viewUser/')}}",
            success: function(response) {
        $("#loader-container-view").hide();

        if (response.success) {
            // iziToast.success({
            //     title: '',
            //     position: 'topRight',
            //     message: response.message
            // });
            // Reload the page to reflect the updated user status
            // location.reload();
            // Delay page reload by 1 seconds
            // setTimeout(function() {
                location.reload();
            // }, 100); // 1 seconds

        } else {
            // iziToast.error({
            //     title: '',
            //     position: 'topRight',
            //     message: response.message
            // });
            // setTimeout(function() {
                location.reload();
            // }, 100); // 1 seconds
        }

        // Close the block modal
        $("#view-user-modal").modal("hide");
    },
      });
  }
 });
});

    $(document).ready(function () {

        $(document).on('click' ,'#delete-user', function(){
            var id = $(this).attr('data-id');
            $('#user_id_for_delete').val(id);
            });

            $(document).on('click' , '#deleteBtn' , function(){
                console.log("Working")
                var id = $('#user_id_for_delete').val()
                console.log(id)
                // console.log("Data", data)
          if (id!='')
          {
                $.ajax({
                type: 'GET',
                    data: {
                        'id':id
                    },

                    url: "{{url('/deleteBanner/')}}",
                    success: function(response) {
                $("#loader-container-delete").hide();

                if (response.success) {
                    // iziToast.success({
                    //     title: '',
                    //     position: 'topRight',
                    //     message: response.message
                    // });
                    // Reload the page to reflect the updated user status
                    // location.reload();
                    // Delay page reload by 1 seconds
                    // setTimeout(function() {
                        location.reload();
                    // }, 100); // 1 seconds

                } else {
                    // iziToast.error({
                    //     title: '',
                    //     position: 'topRight',
                    //     message: response.message
                    // });
                    // setTimeout(function() {
                        location.reload();
                    // }, 100); // 1 seconds
                }

                // Close the block modal
                $("#delete-user-modal").modal("hide");
            },
              });
          }
         });
        });
</script>

<script>
    $(document).ready(function(){


          // start script for search
          var divsToShow = $('#divToShow').val().split(',');

              for (i = 0; i <= divsToShow.length; i++) {

                  $('#filter_' + divsToShow[i]).show();
              }

              $(document).on('change', '.search_in', function() {
                  var id = $(this).attr('data-id');
                  var search_in = $('#search_in_' + id).val();
                  showHideSpan(search_in, id);
              });

              var formCount = $('#formCount').val();

              for (i = 0; i <= 3; i++) {
                  var search_in = $('#search_in_' + i).val();
                  showHideSpan(search_in, i);
              }

              if (formCount == 4) {
                  $('.add-filter').attr('disabled', 'true');
              }

              $(document).on('click', '.add-filter', function() {
                  var formCount = $('#formCount').val();

                  if (formCount < 4) {

                      formCount++;
                      $('#formCount').val(formCount);

                      if (formCount == 4) {
                          $('.add-filter').attr('disabled', 'true');
                      }

                      var divToShow = $('#divToShow').val();

                      var divArrayToShow = divToShow.split(',');

                      for (i = 0; i <= 4; i++) {

                          if ($('#filter_' + i).is(":visible")) {

                          } else {

                              $('#filter_' + i).show();

                              if (jQuery.inArray(i, divArrayToShow) == -1) {

                                  if (divToShow != '') {
                                      $('#divToShow').val(divToShow + ',' + i);
                                  } else {
                                      $('#divToShow').val(i);
                                  }
                              }

                              return false;
                          }
                      }
                  }

              });


              $(document).on('click', '.remove-filter', function() {
                  var index = $(this).attr('id');

                  $('#filter_' + index).hide();

                  var formCount = $('#formCount').val();
                  formCount--;

                  var divString = $('#divToShow').val();

                  var divArrayToHide = divString.split(',');

                  var divArrayToHide = jQuery.grep(divArrayToHide, function(value) {
                      return value != index;
                  });

                  var divStringToHide = divArrayToHide.toString();
                  $('#divToShow').val(divStringToHide);
                  $('#formCount').val(formCount);

                  $('.add-filter').removeAttr('disabled');
                  $('#user_type_' + i).val('Any').change();
                  //$('#active_flag_'+i).val('Any').change();
                  $('#block_flag_' + i).val('Any').change();
                  //   $('#report_flag_'+i).val('Any').change();
                  $('.date_range' + index).val('');
                  $('.suggestion_text' + index).val('');
              });
          // end script for search
        });


        $(function() {

              for (i = 0; i <= 3; i++) {

                  $('.date_range' + i).daterangepicker({
                      autoUpdateInput: false,
                      locale: {
                          cancelLabel: 'Clear',
                          //format: 'DD-MM-YYYY'
                          format: 'MM/DD/YYYY'
                      }
                  });

                  $('.date_range' + i).on('apply.daterangepicker', function(ev, picker) {
                      //$(this).val(picker.startDate.format('DD-MM-YYYY') + ' ~ ' + picker.endDate.format('DD-MM-YYYY'));
                      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' ~ ' + picker.endDate.format('MM/DD/YYYY'));
                  });

                  $('.date_range' + i).on('cancel.daterangepicker', function(ev, picker) {
                      $(this).val('');
                  });
              }

          });


        function showHideSpan(search_in, i) {

              if (search_in == 'user_name' || search_in == 'email_address' || search_in=='phone_no') {
                  $('#suggestion_text_span_' + i).css('display', 'block');
                  $('#search_type' + i).removeAttr("disabled");
                  $('#search_type_' + i).prop('disabled', false);
                  $('.suggestion_text_' + i).removeAttr("onkeyup", "checkInput(this)");
                  // $('#block_flag_span_' + i).css('display', 'none');
                  // $('#block_flag_' + i).val('Any');
                  // $('#gender_flag_span_' + i).css('display', 'none');
                  // $('#gender_flag_span_' + i).val('Any');
                  // $('#user_type_span_' + i).css('display', 'none');
                  // $('#user_type' + i).val('Any');
                  // $('#report_flag_span_' + i).css('display', 'none');
                  // $('#report_flag_' + i).val('Any');
                  $('#date_range_span_' + i).css('display', 'none');
                  $('.date_range' + i).val('');
                  // $('#is_verified_span_' + i).css('display', 'none');
                  // $('#is_verified' + i).val('Any');
                  // $('#vendor_type_span_' + i).css('display', 'none');

              } else if (search_in == 'create_datetime') {
                  $('#block_flag_span_' + i).css('display', 'none');
                  $('#block_flag_' + i).val('Any');
                  // $('#gender_flag_span_' + i).css('display', 'none');
                  // $('#gender_flag_span_' + i).val('Any');
                  $('#date_range_span_' + i).css('display', 'block');
                  $('#search_type_' + i).attr('disabled', 'disabled');
                  $('.suggestion_text' + i).removeAttr("onkeyup", "checkInput(this)");
                  $('#search_type_' + i).val('exact_match').change();
                  // $('#user_type_span_' + i).css('display', 'none');
                  // $('#user_type' + i).val('Any');
                  $('#suggestion_text_span_' + i).css('display', 'none');
                  $('#is_verified_span_' + i).css('display', 'none');
                  $('#is_verified' + i).val('Any');
                  // $('#vendor_type_span_' + i).css('display', 'none');
              } else if (search_in == 'block_flag') {
                  $('#user_type_span_' + i).css('display', 'none');
                  $('#user_type' + i).val('Any');
                  $('#gender_flag_span_' + i).css('display', 'none');
                  $('#gender_flag_span_' + i).val('Any');
                  $('#block_flag_span_' + i).css('display', 'block');
                  $('#search_type_' + i).prop('disabled', true);
                  $('.suggestion_text_' + i).removeAttr("onkeyup", "checkInput(this)");
                  $('#search_type_' + i).val('exact_match').change();
                  $('#suggestion_text_span_' + i).css('display', 'none');
                  $('#suggestion_venue_' + i).val('');
                  $('.date_range' + i).val('');
                  $('#date_range_span_' + i).css('display', 'none');
                  // $('#active_flag_span_' + i).css('display', 'none');
                  // $('#active_flag' + i).val('Any');
                  // $('#vendor_type_span_' + i).css('display', 'none');

                  //    $('#search_type_'+i).val('exact_match').css('cursor', 'not-allowed');
                  //$('#search_type_'+i).css('cursor', 'not-allowed');
              } else if (search_in == 'is_verified') {
                  $('#user_type_span_' + i).css('display', 'none');
                  $('#user_type' + i).val('Any');
                  $('#is_verified_span_' + i).css('display', 'block');
                  // $('#block_flag_span_' + i).css('display', 'none');
                  // $('#block_flag_' + i).val('Any');
                  // $('#gender_flag_span_' + i).css('display', 'none');
                  // $('#gender_flag_span_' + i).val('Any');
                  $('#search_type_' + i).prop('disabled', true);
                  $('.suggestion_text_' + i).removeAttr("onkeyup", "checkInput(this)");
                  $('#search_type_' + i).val('exact_match').change();
                  $('#suggestion_text_span_' + i).css('display', 'none');
                  $('.date_range' + i).val('');
                  $('#date_range_span_' + i).css('display', 'none');
                  $('#date_range_span_' + i).css('display', 'none');
                  // $('#vendor_type_span_' + i).css('display', 'none');

              }
              else if(search_in == 'gender_flag'){
                  // $('#user_type_span_' + i).css('display', 'none');
                  // $('#user_type' + i).val('Any');
                  // $('#block_flag_span_' + i).css('display', 'none');
                  // $('#block_flag_span_' + i).val('Any');
                  // $('#gender_flag_span_' + i).css('display', 'block');
                  // $('#block_flag_span_' + i).val('Any');
                  // $('#search_type' + i).removeAttr("disabled");
                  // $('#search_type_' + i).prop('disabled', false);
                  // // $('#search_type_' + i).prop('disabled', true);
                  // $('.suggestion_text_' + i).removeAttr("onkeyup", "checkInput(this)");
                  // // $('#search_type_' + i).val('exact_match').change();
                  // $('#suggestion_text_span_' + i).css('display', 'none');
                  // $('#suggestion_venue_' + i).val('');
                  // $('.date_range' + i).val('');
                  // $('#date_range_span_' + i).css('display', 'none');
                  // $('#active_flag_span_' + i).css('display', 'none');
                  // $('#active_flag' + i).val('Any');
                  // $('#vendor_type_span_' + i).css('display', 'none');
              }
          }


</script>


<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Center modal</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <a href="/Profiles{id}">{{$item->full_name}}</a><br></br>
                {{$item->country_code. ' ' .$item->phone_number}}<br></br>
                {{$item->personal_pronounce}}<br></br>
                {{$item->zodiac_sign_id}}<br></br>
                {{$item->created_datetime}}<br></br> --}}

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<!-- modal body delete-blog-modal -->
<div class="modal fade" id="delete-user-modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel4" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content tx-14">
            <div class="modal-header modal-top-header">
                <h5 class="modal-title modal-top-title" id="exampleModalLabel4"><b>Delete Record</b></h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <p class="mg-b-0"><b>Are you sure you want to Delete this Banner?</b></p>
                <input type="hidden" name="user_id_for_delete" id="user_id_for_delete" value="{{ $item->id }}">
            </div>

            <div class="modal-footer">
                <div style="display: flex; justify-content: space-between; width: 100%;">
                    <button type="button" class="btn btn-secondary tx-15" data-bs-dismiss="modal"
                        style="margin-right: auto;">Cancel</button>
                    <a type="button" style="color:white;" id="deleteBtn"
                        class="btn btn-danger tx-15 deleteBtnLoader confirm-delete"
                        style="margin-left: auto;">Delete</a>
                    <div id="loader-container-delete" class="loader-container-delete">
                        <div class="loader-delete"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
