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

     {!! Form::open(['url' => '/transactions', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        <?php for ($i = 0; $i <= 3; $i++) { ?>

                        <div class="col-lg-12" id="filter_{{$i}}" @if($i!=0) style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-lg-2 form-group">

 {!! Form::label('search_in', 'Search In') !!}

<select name="search_in[{{$i}}]" id = "search_in_{{$i}}" data-id="{{$i}}" class="search_in js-states form-control select2-selection__rendered" tabindex="-1" style="width: 100%">

 <option value="full_name" @if(isset($inputValue) && ($inputValue['search_in'][$i]=='full_name' )){{{ "selected" }}} @endif>User Name</option>

 <option value="phone_number" @if(isset($inputValue) && ($inputValue['search_in'][$i]=='phone_no' )){{{ "selected" }}} @endif>Phone No.</option>

<option value="zodiac_sign_id" @if(isset($inputValue) && ($inputValue['search_in'][$i]==' zodiac_sign_id' )){{{ "selected" }}} @endif>Zodiac Name</option>{{-- <option value="gender_flag" @if(isset($inputValue) && ($inputValue['search_in'][$i]=='gender_flag' )){{{ "selected" }}} @endif>Gender</option> --}}

    {{-- <option value="block_flag" @if(isset($inputValue) && ($inputValue['search_in'][$i]=='block_flag' )){{{ "selected" }}} @endif>Is Verified </option> --}}
    {{-- <option value="is_verified" @if(isset($inputValue) && ($inputValue['search_in'][$i] == 'is_verified')){{{ "selected" }}} @endif >Is Active </option> --}}

    <option value="create_datetime" @if(isset($inputValue) && ($inputValue['search_in'][$i]=='create_datetime' )){{{ "selected" }}} @endif>Date</option>

     </select>

    </div>

      <div class="col-lg-2 form-group form-group-search">
      {!! Form::label('search_type', 'Search Type') !!}
        <select name="search_type[{{$i}}]" id="search_type_{{$i}}" class="js-states form-control select2-selection__rendered" tabindex="-1" style="width: 100%">
            <option value="contains" @if(isset($inputValue) && ($searchType[$i]=='contains' )){{{ "selected" }}} @endif>Contains</option>

    <option value="begins_with" @if(isset($inputValue) && ($searchType[$i]=='begins_with' )){{{ "selected" }}} @endif>Begins With</option>
    <option value="ends_with" @if(isset($inputValue) && ($searchType[$i]=='ends_with' )){{{ "selected" }}} @endif>Ends With</option>
    <option value="exact_match" @if(isset($inputValue) && ($searchType[$i]=='exact_match' )){{{ "selected" }}} @endif>Exact Match</option>
     </select>

    </div>

        <div class="col-lg-3 form-group form-group-search">
        <span id="suggestion_text_span_{{$i}}">

        {!! Form::label('suggestion_text', 'Enter Text') !!}

        <input type="text" name="suggestion_text[{{$i}}]" value="<?php if (isset($inputValue)) {
                                            echo $inputValue['suggestion_text'][$i];
                                            } ?>" class='form-control suggestion_text{{$i}}' id='suggestion_venue_{{ $i }}' onblur='trim(this)' maxlength='255' autocomplete='off'>
    <span id="display_suggestion_venue_list" style="position:absolute;margin-top:-1px;display:none;overflow:hidden;background-color:white; z-index:9; width:97%"></span>
                                        </span>

    <span id="block_flag_span_{{$i}}" style="display:none;">

        {!! Form::label('Block', 'Select') !!}
    <select name="block_flag[{{$i}}]" id="block_flag_{{$i}}" class="js-states form-control" tabindex="-1" style="width:100%; height:38px;">
    <option value="Any">Any</option>

    <option value="1" @if(isset($inputValue) && ($inputValue['block_flag'][$i]=='1' )){{{ "selected" }}} @endif>Yes</option>

        <option value="0" @if(isset($inputValue) && ($inputValue['block_flag'][$i]=='0' )){{{ "selected" }}} @endif>No</option> </select>
    </span>

                {{-- <span id="gender_flag_span_{{$i}}" style="display:none;">
            {!! Form::label('Block', 'Select') !!}
        <select name="gender_flag[{{$i}}]" id="gender_flag_{{$i}}" class="js-states form-control" tabindex="-1" style="width:100%; height:38px;">
             <option value="Any">Any</option>
    <option value="M" @if(isset($inputValue) && ($inputValue['gender_flag'][$i]=='M' )){{{ "selected" }}} @endif>Male</option>
             <option value="F" @if(isset($inputValue) && ($inputValue['gender_flag'][$i]=='F' )){{{ "selected" }}} @endif>Female</option>
                 </select>
                </span> --}}
                {{-- <span id="is_verified_span_{{$i}}" style="display:none;">
        {!! Form::label('Active', 'Select') !!}
         <select name="is_verified[{{$i}}]" id="is_verified_{{$i}}" class="js-states form-control" tabindex="-1" style="width:100%; height:38px;">
                   <option value="Any">Any</option>
                 <option value="1" @if(isset($inputValue) && ($inputValue['is_verified'][$i]=='1' )){{{ "selected" }}} @endif>Yes</option>
        <option value="0" @if(isset($inputValue) && ($inputValue['is_verified'][$i]=='0' )){{{ "selected" }}} @endif>No</option>
        </select>
        </span> --}}

<span id="date_range_span_{{$i}}" style="display: none; width: 100%;">
    {!! Form::label('date_range', 'Date Range') !!} (m/d/Y)

<input type="text" class="form-control date-range-piker-field date_range{{$i}}" name="datefilter[{{$i}}]" id="datepicker-range" value="<?php if (isset($inputValue))

{                                                                                                 echo $inputValue['datefilter'][$i];
} ?>" readonly required>
</span>
        </div>
<div class="col-lg-2 form-group form-group-search mt-2">

    @if($i == 0)

    <button type="button" class="btn btn-primary btn-addon add-filter criteria-btn mt-3" id="{{$i}}"><i class="fa fa-plus fa-lg" style="margin-right: 4px; font-weight: bold;"></i>Criteria</button>

    @else
    <button type="button" class="btn btn-danger remove-filter criteria-btn mt-3" id="{{$i}}"><i class="fa fa-times fa-lg" style="margin-right: 4px; font-weight: bold;"></i> Criteria</button>
    @endif
    </div>

 @if($i==0)
                                    <!-- <div class="col-md-1"></div> -->
    <div class="col-lg-1 form-group form-group-search" style="padding: 0;">

        {!! Form::label('Limit', 'Limit') !!}
        <select name="limit_flag" id="limit_flag" class="js-states form-control" tabindex="-1">

        <option value="50" @if(isset($inputValue) && ($inputValue['limit_flag']==50) || isset($default_limit)){{{ "selected" }}} @endif>50</option>
        <option value="100" @if(isset($inputValue) && ($inputValue['limit_flag']==100)){{{ "selected" }}} @endif>100</option>
        <option value="200" @if(isset($inputValue) && ($inputValue['limit_flag']==200)){{{ "selected" }}} @endif>200</option>
        <option value="500" @if(isset($inputValue) && ($inputValue['limit_flag']==500)){{{ "selected" }}} @endif>500</option>
       <option value="1000" @if(isset($inputValue) && ($inputValue['limit_flag']==1000)){{{ "selected" }}} @endif>1000</option>
             <option value="2000" @if(isset($inputValue) && ($inputValue['limit_flag']==2000)){{{ "selected" }}} @endif>2000</option>
                                            {{-- <option value="" @if(isset($inputValue) && ($inputValue['limit_flag']=="" )){{{ "selected" }}} @endif>All</option> --}}
    </select>
     </div>
         <div class="col-lg-2 form-group form-group-search mt-2">

     <button type="submit" class="btn btn-primary btn-addon m-y-sm seach-filter-btn mt-3"style="width:130px;" ><i class="fa fa-search" style="margin-right: 4px;"></i> Filter/Apply</button>
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
        <h4 class="mb-sm-0 font-size-18">test DataTable</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                                            <li class="breadcrumb-item active">DataTable</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
 <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 text-center">
                    <thead>

                    <tr class="text-center">

                        <th class="text-center">User Name</th>
                        <th class="text-center">Date of transaction</th>
                        <th class="text-center">Subscription type</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Status</th>


                    </tr>

                    </thead>
                    <tbody>

                        @foreach($data as $item)
                    <tr>


            <td><img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm rounded-circle me-2">
                        <a href="#"
                        id="viewUser"
                         {{-- data-toggle="modal" data-target="#exampleModalCenter" data-id={{$item->user_id}} --}}

                            data-id="{{ $item->user_id }}" data-bs-toggle="modal" data-bs-target="#viewUserDetail">

                        {{$item->full_name}}</a></td>

                        <td>{{$item->created_datetime}}</td>
                        <td>{{$item->subscription_type}}</td>
                        <td>{{$item->subscription_type}}</td>
                        <td> status Dummy</td>


                    {{-- <td>

    <div class="dropdown">

<button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
 <i class="bx bx-dots-horizontal-rounded"></i>
 </button>

<ul class="dropdown-menu dropdown-menu-end">
    <li> <a class="btn btn-outline-secondary btn-sm edit view-user" title="View Profile" data-id="{{ $item->user_id }}" data-bs-toggle="modal" data-bs-target="#viewUserDetails">
                                    View </a>
                                </li>
         <li>
            <a id="delete-user" class="btn btn-outline-secondary btn-sm edit delete-user" title="Delete" data-id="{{ $item->user_id }}" data-bs-toggle="modal" href="#delete-user-modal">
                                <span>Delete</span></a></li>
                                {{-- <li><a class="dropdown-item" href="{{url('/deleterecord/{req}')}}">Delete Profile</a></li> --}}
                            {{-- </ul>
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

<script src="assets/libs/jquery/jquery.min.js"></script>

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

        $(document).on('click' ,'#delete-user', function(){
            var id = $(this).attr('data-id');
            $('#user_id_for_delete').val(id);
        });
         $(document).on('click' , '#deleteBtn' , function(){
            var id = $('#user_id_for_delete').val()
          if (id!='') {
              $.ajax({
                type: 'GET',
                    data: {
                        'id':id
                    },
                    url: "{{url('/deleteUser/')}}",
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


{{-- <div id="viewUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

             <h5 class="modal-title">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <a href="('/Profiles{id}')">{{$item->full_name}}</a><br></br>
                {{$item->country_code. ' ' .$item->phone_number}}<br></br>
                {{$item->personal_pronounce}}<br></br>
                {{$item->zodiac_sign_id}}<br></br>
                {{$item->created_datetime}}<br></br>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> --}}


<div class="modal fade bs-example-modal-center" id="viewUserDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Profile View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body display-user-data">

                {{-- <a href="('/Profiles{id}')">{{$item->full_name}}</a><br></br>
                {{$item->country_code. ' ' .$item->phone_number}}<br></br>
                {{$item->personal_pronounce}}<br></br>
                {{$item->zodiac_sign_id}}<br></br>
                {{$item->created_datetime}}<br></br> --}}

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade bs-example-modal-center" id="viewUserDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Profile View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body display-user-data">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- modal body delete-blog-modal -->
<div class="modal fade" id="delete-user-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content tx-14">
        <div class="modal-header modal-top-header">
          <h5 class="modal-title modal-top-title" id="exampleModalLabel4"><b>Delete Record</b></h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>



        <div class="modal-body">
          <p class="mg-b-0"><b>Are you sure you want to delete this user?</b></p>
          <input type="hidden" name="user_id_for_delete" id="user_id_for_delete" value="">
        </div>

        <div class="modal-footer">
            <div style="display: flex; justify-content: space-between; width: 100%;">
                <button type="button" class="btn btn-secondary tx-15" data-bs-dismiss="modal" style="margin-right: auto;">Cancel</button>

         <a type="button" style="color:white;" id="deleteBtn" class="btn btn-danger tx-15 deleteBtnLoader confirm-delete" style="margin-left: auto;">Delete</a>
                <div id="loader-container-delete" class="loader-container-delete">
                    <div class="loader-delete"></div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('#viewUserDetail').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var userId = button.data('id'); // Extract user ID from data-id attribute
        var modal = $(this);

        // Make an AJAX request to fetch user data
        $.ajax({
            url: '/getUserData.php', // URL to your server-side PHP script
            method: 'POST',
            data: { userId: userId }, // Send user ID to the server
            success: function (response) {
                // Populate modal with retrieved user data
                modal.find('.modal-body').html(response);
            },
            error: function () {
                alert('Error fetching user data');
            }
        });
    });
</script>

  <!-- end -->
<!-- End Page-content -->
@endsection
