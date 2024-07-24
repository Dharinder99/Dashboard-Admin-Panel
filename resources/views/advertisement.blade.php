@extends('layouts.master')
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            {!! Form::open(['url' => '/advertisements', 'method' => 'post', 'enctype' =>
                            'multipart/form-data']) !!}
                            <?php  for ($i = 0; $i <= 3; $i++) { ?>

                            <div class="col-lg-12" id="filter_{{$i}}" @if($i!=0) style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-lg-2 form-group">

                                        {!! Form::label('search_in', 'Search In') !!}


                                        <select name="search_in[{{$i}}]" id="search_in_{{$i}}" data-id="{{$i}}"
                                            class="search_in js-states form-control select2-selection__rendered"
                                            tabindex="-1" style="width: 100%">

                                            <option value="full_name" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='full_name' )){{{ "selected" }}} @endif>
                                                Country</option>

                                            <option value="phone_number" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='phone_no' )){{{ "selected" }}} @endif>
                                                State</option>

                                            <option value="zodiac_sign_id" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]==' zodiac_sign_id' )){{{ "selected" }}}
                                                @endif>Pincode</option>

                                            <option value="zodiac_sign_id" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]==' zodiac_sign_id' )){{{ "selected" }}}
                                                @endif> Ball AD Slot</option>

                                            <option value="zodiac_sign_id" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]==' zodiac_sign_id' )){{{ "selected" }}}
                                                @endif>Status</option>

                                            {{-- <option value="gender_flag" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='gender_flag' )){{{ "selected" }}}
                                                @endif>Gender</option> --}}

                                            {{-- <option value="block_flag" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='block_flag' )){{{ "selected" }}} @endif>
                                                Is Verified </option> --}}
                                            {{-- <option value="is_verified" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='is_verified' )){{{ "selected" }}}
                                                @endif>Is Active </option> --}}

                                            <option value="create_datetime" @if(isset($inputValue) &&
                                                ($inputValue['search_in'][$i]=='create_datetime' )){{{ "selected" }}}
                                                @endif>Date</option>

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

                                        {{-- <span id="gender_flag_span_{{$i}}" style="display:none;">
                                            {!! Form::label('Block', 'Select') !!}
                                            <select name="gender_flag[{{$i}}]" id="gender_flag_{{$i}}"
                                                class="js-states form-control" tabindex="-1"
                                                style="width:100%; height:38px;">
                                                <option value="Any">Any</option>
                                                <option value="M" @if(isset($inputValue) &&
                                                    ($inputValue['gender_flag'][$i]=='M' )){{{ "selected" }}} @endif>
                                                    Male</option>
                                                <option value="F" @if(isset($inputValue) &&
                                                    ($inputValue['gender_flag'][$i]=='F' )){{{ "selected" }}} @endif>
                                                    Female</option>
                                            </select>
                                        </span> --}}
                                        {{-- <span id="is_verified_span_{{$i}}" style="display:none;">
                                            {!! Form::label('Active', 'Select') !!}
                                            <select name="is_verified[{{$i}}]" id="is_verified_{{$i}}"
                                                class="js-states form-control" tabindex="-1"
                                                style="width:100%; height:38px;">
                                                <option value="Any">Any</option>
                                                <option value="1" @if(isset($inputValue) &&
                                                    ($inputValue['is_verified'][$i]=='1' )){{{ "selected" }}} @endif>Yes
                                                </option>
                                                <option value="0" @if(isset($inputValue) &&
                                                    ($inputValue['is_verified'][$i]=='0' )){{{ "selected" }}} @endif>No
                                                </option>
                                            </select>
                                        </span> --}}

                                        <span id="date_range_span_{{$i}}" style="display: none; width: 100%;">
                                            {!! Form::label('date_range', 'Date Range') !!} (m/d/Y)

                                            <input type="text"
                                                class="form-control date-range-piker-field date_range{{$i}}"
                                                name="datefilter[{{$i}}]" id="datepicker-range" value="<?php if (isset($inputValue)){
                                                    echo $inputValue['datefilter'][$i];
                                             } ?>" readonly required>
                                        </span>
                                    </div>
                                    <div class="col-lg-2 form-group form-group-search mt-2">

                                        @if($i == 0)

                                        <button type="button"
                                            class="btn btn-primary btn-addon add-filter criteria-btn mt-3"
                                            id="{{$i}}"><i class="fa fa-plus fa-lg"
                                                style="margin-right: 4px; font-weight: bold;"></i>Criteria</button>

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
                        <h4 class="mb-sm-0 font-size-18">Advertisements DataTable</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                                <li class="breadcrumb-item active">DataTable</li> --}}
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- <button type="button" class="btn btn-primary " data-bs toggle="modal" id="addNew" data-bs
                target="#userFormModal"> <i class="fa fa-plus fa-lg" style="margin-right: 4px; font-weight: bold;">
                </i>Add New</button> --}}


            {{-- <div class=" d-flex justify-content-end "> --}}
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#userFormModal" id="openFormButton"> <i class="fa fa-plus fa-lg"
                        style="margin-right: 4px; font-weight: bold;">
                    </i>Add New</button>

                {{-- <button type="button" class="btn btn-primary" id="openFormButton">
                    Add New
                </button> --}}

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <table class="table table-bordered dt-responsive nowrap w-100 text-center">
                                <thead>
                                    <tr class="text-center">
                                        {{-- <th class="text-center">Advertisement</th> --}}
                                        <th class="text-center">Country</th>
                                        <th class="text-center">State</th>
                                        <th class="text-center">City</th>
                                        <th class="text-center">Pin Code</th>
                                        <th class="text-center">Balls Count</th>

                                        <th class="text-center">Status</th>



                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach($userdata as $item)
                                    <tr>
                                        <td>

                                            {{-- <img src="assets/images/users/avatar-2.jpg" alt=""
                                                class="avatar-sm rounded-circle me-2">
                                            <a href="#" id="viewUser" data-id={{$item->user_id}} > --}}

                                                {{$item->country}}</a>
                                        </td>

                                        <td>{{$item->state_id}}</td>
                                        <td>{{$item->city_id}}</td>

                                        <td>{{$item->pincode}}</td>
                                        <td>{{$item->ball_id}}</td>

                                        {{-- <div class="dropdown">
                                            <button
                                                class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li> --}}
                                                    {{-- <a class="btn btn-outline-secondary btn-sm edit view-user"
                                                        title="Edit" data-id="{{ $item->user_id }}"
                                                        data-bs-toggle="modal" data-bs-target="#viewUserDetails">
                                                        View </a> --}}
                                                    {{-- </li>
                                                <li>
                                                    <a id="delete-user"
                                                        class="btn btn-outline-secondary btn-sm edit delete-user"
                                                        title="Delete" data-id="{{ $item->user_id }}"
                                                        data-bs-toggle="modal" href="#delete-user-modal">
                                                        <span>Delete</span></a>
                                                </li> --}}
                                                {{--
                                            </ul> --}}
                                            <td style="text-align: center;">
                                                <div class="dropdown">
                                                    <button class="btn btn-light dropdown-toggle" type="button"
                                                        id="dropdownMenu-{{ $item->advertisement_id }}"

                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"
                                                        style="border: none; background: transparent;">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>

                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenu-{{ $item->advertisement_id }}">

                                                        <!-- "View User" with eye icon -->
                                                        <button id="editadvert"class="dropdown-item edit-modal"
                                                            data-id="{{ $item->advertisement_id }}">

                                                            {{-- data-bs-toggle="modal"
                                                            data-bs-target="#EditModal" --}}
                                                            {{-- data-id="{{ $item->advertisement_id }}" --}}
                                                            <i class="fas fa-eye green-icon"
                                                                style="color: green"></i>&nbsp;
                                                            &nbsp;Edit </button>

                                                        {{-- <button class="edit-modal" id="editadvert"
                                                            data-id="{{ $item->advertisement_id }}">Edit</button> --}}

                                                        <!-- "Delete User" with trash icon -->
                                                        <a id="delete-user" class="dropdown-item edit delete-user"
                                                            title="Delete" data-id="{{ $item->advertisement_id }}"
                                                            data-bs-toggle="modal" href="#delete-user-modal"
                                                            class="dropdown-item delete-user"><i
                                                                class="fas fa-trash-alt red-icon"
                                                                style="color: red"></i>&nbsp;
                                                            &nbsp;Delete</a>
                                            </td>

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


    <script src="assets/libs/jquery/jquery.min.js"></script>






    <script>
        $(document).ready(function() {
        // Open the modal when the button is clicked
        $('#openFormButton').on('click', function() {
            $('#userFormModal').modal('show');
        });

        // Handle form submission via AJAX
        $('#userForm').on('submit', function(event) {
            event.preventDefault();
            var registerData = $('#userForm')[0];
            var formData = new FormData(registerData);
            $.ajax({
                url: '{{ route("uploadadvertisement") }}',
                method: 'POST',
                data: formData,
                contentType:false,
                processData:false,
                success: function(response) {
                    alert('User data saved successfully.');
                    $('#userFormModal').modal('hide');
                    $('#userForm')[0].reset(); // Reset the form
                    window.location.reload()
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });
    });
    </script>

    <script>
        $(document).ready(function () {
        $(document).on('click','.view-user', function(){
            var id = $(this).attr('data-id');
            if(id!=''){
                $.ajax({
                    type : 'GET',
                    data : {'id':id},
                    url  : "{{url('get-user-data-by-id')}}",
                    success : function(data){
                        $('.display-user-data').html(data);
                    }
                })
            }
        });

        $(document).on('click' ,'#userformodal', function(){
            var id = $(this).attr('data-id');
            $('#user_id_for_delete').val(id);
        });
         $(document).on('click' , '#deleteBtn' , function(){
            var id = $('#user_id_for_delete').val()
            console.log(id)
          if (id!='') {
              $.ajax({
                type: 'GET',
                    data: {
                        'id':id
                    },
                    url: "{{url('/deleteadvertisement/')}}",
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

              if (search_in == 'user_name' || search_in == 'zodiac_sign_id' || search_in=='phone_no') {
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


    <!-- modal body delete-blog-modal -->
    <div class="modal fade" id="delete-user-modal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel4" aria-hidden="true" data-bs-backdrop="static">

        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content tx-14">
                <div class="modal-header modal-top-header">
                    <h5 class="modal-title modal-top-title" id="exampleModalLabel4"><b>Delete Advertisement</b></h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    --}}
                </div>
                <div class="modal-body">
                    <p class="mg-b-0"><b>Are you sure you want to delete this user?</b></p>
                    <input type="hidden" name="user_id_for_delete" id="user_id_for_delete"
                        value="{{ $item->advertisement_id }}">
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
    <!-- end -->
    <!-- End Page-content -->


    <!-- Add Modal -->
    <div>
        <div class="modal fade" id="userFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header mt-5">
                        <h5 class="modal-title" id="exampleModalLabel">Advertisement Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="userForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-flex">
                                <div class="">
                                    <label for="country_id">Country</label>

                                    <span style="color: red !important; display: inline; float: none;">*</span>

                                    <select id="country_id" , name="country_name" class="form-control" required>
                                        <option value="">Select Country </option>

                                        @foreach ($country as $countries)

                                        <option value="{{$countries->id}}"> {{$countries->name}} </option>

                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="state_id">State</label>
                                    <select id="state_id" , name="state_name" class="form-control"></select>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="city_id">City</label>
                                    <select id="city_id" name="city_name" class="form-control"></select>
                                </div>

                                <div class="my-2"><label for="pincode">PinCode</label>

                                    <span style="color: red !important; display: inline; float: none;">*</span>

                                    <input type="text" value="" name="pincode_name" id="pincode" Placeholder="Pincode"
                                        class="form-control">

                                    </select>
                                </div>

                                <div class="col-6 md:col-12 my-2"> <label for="ball_id">ball AD Slot</label><span
                                        style="color: red !important; display: inline; float: none;">*</span>
                                    <select id="ball_id" name="ball_id" class="form-control" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>


                                <div class="col-6 md:col-12 my-2"> <label for="upload_image">Upload The
                                        Advertisement</label><span
                                        style="color: red !important; display: inline; float: none;">*</span>
                                    <input type="file" id="upload_image" name="upload_image" />
                                </div>

                                <div class="col-2"></div>
                                <div class="col-2"></div>
                            </div>


                    </div>
                    <button type="submit" class="btn btn-secondary">Publish</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <div>
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header mt-5">
              <h5 class="modal-title" id="exampleModalLabel">Edit Advertisement Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>

                    <div class="modal-body">
                        <form id="EditForm" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="row d-flex">
                                <div class="">

                                    <input type="hidden" name="id" id="advertisement_id" value="">

                                    <label for="edit_country_id">Country</label>

                                    <span style="color: red !important; display: inline; float: none;">*</span>

                                    <select id="edit_country_id" , name="country_name" class="form-control" required>

                                        <option value="">select a country"></option>



                                    </select>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="edit_state_id">State</label>
                                    <select id="edit_state_id" , name="state_name" class="form-control"
                                        required></select>
                                    <option value=""> </option>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="edit_city_id">City</label>
                                    <select id="edit_city_id" name="edit_city_name" class="form-control"
                                        required></select>
                                    <option value=""> </option>
                                </div>

                                <div class="my-2"> <label for="editpincode">PinCode</label>

                                    <span style="color: red !important; display: inline; float: none;">*</span>

                                    <input type="text" value="" name="pincode_name" id="editpincode"
                                        Placeholder="Pincode" class="form-control" required>

                                    </select>
                                </div>

                                <div class="col-6 md:col-12 my-2"> <label for="edit_ball_id">ball AD Slot </label><span
                                        style="color: red !important; display: inline; float: none;">*</span>
                                    <select id="edit_ball_id" name="ball_id" class="form-control" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>


                                <div class="col-6 md:col-12 my-2"> <label for="edit_upload_image">Upload The
                                        Advertisement</label><span
                                        style="color: red !important; display: inline; float: none;">*</span>

                                    <input type="file" id="edit_upload_image" name="upload_image" required />
                                </div>

                                <div class="col-2"></div>
                                <div class="col-2"></div>
                            </div>



                    </div>
                    <button type="submit" id = "" class="btn btn-secondary">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="assets/libs/jquery/jquery.min.js"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

   <script>

        $(document).ready(function() {
        var countries = [];
        var states = [];
        var cities = [];

        // Fetch all countries
        $.ajax({
            url: "/get-all-countries",
            type: "GET",
            success: function(data) {
                countries = data;
            }
        });

        // Fetch all states
        $.ajax({
            url: "/get-all-states",
            type: "GET",
            success: function(data) {
                states = data;
            }
        });

        // Fetch all cities
        $.ajax({
            url: "/get-all-cities",
            type: "GET",
            success: function(data) {
                cities = data;
            }
        });


    $(document).on('click', '#editadvert', function(event) {
            // console.log("aaaa");
            event.preventDefault();

            const currentId = $(this).attr('data-id');

            console.log("openEditModal id", currentId);
            $('#modal-advertisement-id').val(currentId);
            $('#EditModal').modal('show');

            if(currentId == "") {
                $("#edit_country_id").html("<option value=''>Select Country</option>");
                $("#edit_state_id").html("<option value=''>Select State</option>");

                $("#edit_city_id").html("<option value=''>Select City</option>");

            }

            // Function to fetch and populate states based on the selected country
            function fetchStates(countryId, selectedStateId = null) {
                $.ajax({
                    url: "/edit-fetch-state/" + countryId,
                    type: "GET",
                    success: function(stateData) {
                        console.log("Related state", stateData.states);
                        var state_html = "<option value=''>Select State</option>";
                        for (let i = 0; i < stateData.states.length; i++) {
                            if (stateData.states[i]['id'] == selectedStateId) {
                                state_html += `<option value="${stateData.states[i]['id']}" selected>${stateData.states[i]['name']}</option>`;
                            } else {
                                state_html += `<option value="${stateData.states[i]['id']}">${stateData.states[i]['name']}</option>`;
                            }
                        }
                        $("#edit_state_id").html(state_html);

                        // Trigger the change event to fetch cities for the selected state
                        if (selectedStateId) {
                            fetchCities(selectedStateId, null); // Pass null for cityId to avoid preselecting any city initially
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            // Function to fetch and populate cities based on the selected state

            function fetchCities(stateId, selectedCityId = null) {
                $.ajax({
                    url: "/edit-fetch-cities/" + stateId,
                    type: "GET",
                    success: function(cityData) {
                        console.log("Related cities", cityData.cities);
                        var cities_html = "<option value=''>Select City</option>";
                        for (let i = 0; i < cityData.cities.length; i++) {
                            if (cityData.cities[i]['id'] == selectedCityId) {
                                cities_html += `<option value="${cityData.cities[i]['id']}" selected>${cityData.cities[i]['name']}</option>`;
                            } else {
                                cities_html += `<option value="${cityData.cities[i]['id']}">${cityData.cities[i]['name']}</option>`;
                            }
                        }
                        $("#edit_city_id").html(cities_html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }


            $.ajax({
                url: "/editloadadvertisement/" + currentId,
                type:"GET",
                success:function(data) {
                    console.log("Result of edit", data);
                    var edit_country = data.country_id;
                    var edit_state = data.state_id;
                    var edit_city = data.city_id;
                    var pincodes = data.pincode;
                    var ballcount = data.ball_id;

                    $('#editpincode').val(pincodes);
                    $('#edit_ball_id').val(ballcount);

                    // Render countries
                    var country_html = "<option value=''>Select Country</option>";
                    for (let i = 0; i < countries.length; i++) {
                        if (countries[i]['name'] == edit_country) {
                            country_html += `<option value="${countries[i]['id']}" selected>${countries[i]['name']}</option>`;
                        } else {
                            country_html += `<option value="${countries[i]['id']}">${countries[i]['name']}</option>`;
                        }
                    }
                    $("#edit_country_id").html(country_html);

                    // Fetch and render states
                    $.ajax({
                        url: "/edit-fetch-state/" + edit_country,
                        type: "GET",
                        success: function(stateData){
                            console.log("Related state", stateData.states);
                            var state_html = "<option value=''>Select State</option>";
                            for (let i = 0; i < stateData.states.length; i++) {
                                if (stateData.states[i]['name'] == edit_state) {
                                    state_html += `<option value="${stateData.states[i]['id']}" selected>${stateData.states[i]['name']}</option>`;
                                } else {
                                    state_html += `<option value="${stateData.states[i]['id']}">${stateData.states[i]['name']}</option>`;
                                }
                            }

                            $("#edit_state_id").html(state_html); // Update state dropdown

                            // Fetch and render cities after states are loaded
                            $.ajax({
                                url: "/edit-fetch-cities/" + edit_state,
                                type: "GET",
                                success: function(cityData){
                                    console.log("Related cities",cityData.cities);
                                    var cities_html = "<option value=''>Select City</option>";

                    for (let i = 0; i < cityData.cities.length; i++) {
                                        if (cityData.cities[i]['name'] == edit_city) {
                                            cities_html += `<option value="${cityData.cities[i]['id']}" selected>${cityData.cities[i]['name']}</option>`;
                                        } else {
                                            cities_html += `<option value="${cityData.cities[i]['id']}">${cityData.cities[i]['name']}</option>`;
                                        }
                                    }
                                    $("#edit_city_id").html(cities_html); // Update city dropdown
                                },
                                error: function(xhr, status, error){
                                    console.error('Error:', error); // Log any errors to console
                                }
                            });

                        },
                        error: function(xhr, status, error){
                            console.error('Error:', error); // Log any errors to console
                        }
                    });
                },
                error: function(xhr, status, error){
                    console.error('Error:', error); // Log any errors to console
                }
            });

        });


    });
    </script>

    <script>
        $(document).ready(function(){
        $(".editButton").click(function() {
            let  currentId = $(this).attr('data-id');

            console.log("Clicked Website")
            console.log("Clicked Website", currentId)
        })

    $('#EditForm').on('submit', function(event) {
        event.preventDefault();

        const id = $('#EditForm').data('id');
        const formData = new FormData(this);

        $.ajax({
            url: `/advertisements/${id}/update`,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#EditModal').modal('hide');
                    // Optionally, you can refresh the page or the advertisement list here
                }
            }
        });
    });

    // Event listener to load states and cities dynamically
    $('#EditForm #country_id').on('change', function() {
        const countryId = $(this).val();
        if (countryId) {
            $.ajax({
                url: `/states/${countryId}`,
                method: 'GET',
                success: function(states) {
                    $('#EditForm #state_id').empty().append(`<option value="">Select State</option>`);
                    states.forEach(state => {
                        $('#EditForm #state_id').append(`<option value="${state.id}">${state.name}</option>`);
                    });
                }
            });
        }
    });

    $('#EditForm #state_id').on('change', function() {
        const stateId = $(this).val();
        if (stateId) {
            $.ajax({
                url: `/cities/${stateId}`,
                method: 'GET',
                success: function(cities) {
                    $('#EditForm #city_id').empty().append(`<option value="">Select City</option>`);
                    cities.forEach(city => {
                        $('#EditForm #city_id').append(`<option value="${city.id}">${city.name}</option>`);
                    });
                }
            });
        }
    });
     });

    </script>

    <script>
        
        $(document).ready(function(){

        $("#country_id").change(function(){

            var country_id = $(this).val();
            if(country_id === ""){
                $("#state_id").html("<option value=''>Select State</option>");
                return; // Exit function early if country_id is empty
            }

            $.ajax({
                url: "/fetch-state/" + country_id,
                type: "GET",
                success: function(data){
                    console.log(data); // Check data in console
                    var states = data.states; // Assuming your response has an array of states under 'states'

             var html = "<option value=''>Select State</option>";
                    for(let i = 0; i < states.length; i++){
                        html += `<option value="${states[i].id}">${states[i].name}</option>`;
                    }
                    $("#state_id").html(html); // Update state dropdown
                },
                error: function(xhr, status, error){
                    console.error('Error:', error); // Log any errors to console
                }
            });

        });

        $("#state_id").change(function(){

            var state_id = $(this).val();
            if(state_id === ""){
                $("#city_id").html("<option value=''>Select City</option>");
                return; // Exit function early if country_id is empty
            }
            console.log(state_id)

            $.ajax({
                url: "/fetch-cities/" + state_id,
                type: "GET",
                success: function(data){
                    console.log(data); // Check data in console
                    var cities = data.cities; // Assuming your response has an array of states under 'states'

                    var html = "<option value=''>Select City</option>";
                    for(let i = 0; i < cities.length; i++){
                        html += `<option value="${cities[i].id}">${cities[i].name}</option>`;
                    }
                    $("#city_id").html(html); // Update state dropdown
                },
                error: function(xhr, status, error){
                    console.error('Error:', error); // Log any errors to console
                }
            });

        });

        });



    </script>


    @endsection
