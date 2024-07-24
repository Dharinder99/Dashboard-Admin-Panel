<div class="conatiner">
    <div class="coloumn">
        <div class="col-sm-6">
            <label for="name">User Id</label>
            <input type="text" class="form-control" value="{{$data->user_id}}" readonly>
        </div>
        <div class="col-sm-6">
            <label for="">Profile Picture</label>
            <img src="{{$data->profile_image_full_url}}" class="form-control" readonly>
        </div>
        <div class="col-sm-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{$data->full_name}}" readonly>
        </div>
        <div class="col-sm-6">
            <label for="">Mobile</label>
            <input type="text" class="form-control" value="{{$data->phone_number}}" readonly>
        </div>
    </div>
</div>