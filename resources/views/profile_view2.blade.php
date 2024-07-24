<style>
    /* Remove external border from modal content */
    .modal-content {
        border: none;
    }

    /* / Add border to card / */
    .card {
        / border: 1px solid #ccc;/ border-radius: 5px;
        margin-bottom: 15px;
    }

    /* / Remove default box shadow from card / */
    .card:not(.card-header) {
        box-shadow: none;
    }
</style>
<div class="modal-content">
    <div class="row">

        <!-- Personal Details -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Personal Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{--
                        <?php
        //       $profileImage='';
        //       $profilePic = $userDetails->profile_pic_thumbnail;
        //       if($profilePic != '' || $profilePic != null){
        //       $profileImage = Users::getS3ImageURL($profilePic);
        //   }
          ?> --}}
                        <div class="col-md-2 mt-3 text-center">
                            <div class="form-group">
                                <div class="image-upload">
                                    <img class="img-circle rounded-circle img-fluid" src="{{ $profileImage}}"
                                        onerror="this.src='DefaultImage/pngfind.com-profile-icon-png-804674.png'"
                                        style="max-width: 120px; height: 120px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label">Full Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{ $data->full_name }}"
                                        readonly="true">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label">Phone No</label>
                                <div class="col-md-8">
                                    <input type="text" value="{{ $data->country_code }}-{{ $data->phone_number }}"
                                        class="form-control" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label">Sexual Orientation</label>
                                <div class="col-md-8">
                                    <input type="text" value="{{ $data->personal_pronounce }}" class="form-control"
                                        readonly="true">
                                </div>
                            </div>

                            {{-- <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Registered On:</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ $users->created_datetime }}" class="form-control"
                                        readonly="true">
                                </div>
                            </div> --}}
                            <!-- Additional personal details fields -->
                        </div>
                        <div class="col-md-5">

                            {{-- <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Age:</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ calculateAge($users->dob) }} years"
                                        class="form-control" readonly="true">
                                </div>
                            </div> --}}

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Languages</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ implode(', ', json_decode($data->languages)) }}"
                                        class="form-control" readonly="true">
                                </div>
                            </div>
                            @if ($data->is_blocked == 1)
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Blocked Date</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ date('m/d/Y', strtotime($data->blocked_datetime)) }}"
                                        class="form-control" readonly="true">
                                </div>
                            </div>
                            @endif

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Relationship Status</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{ $data->relationship_status }}"
                                        readonly="true">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Details -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">User Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Ethnic Group</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" value="{{ $data->ethnic_group }}"
                                        readonly="true">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Gender</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" value="{{ $data->gender }}" readonly="true">
                                </div>
                            </div>
                            {{-- <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Interests</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        value="{{ implode(', ', json_decode($userDetails->interests)) }}"
                                        readonly="true">
                                </div>
                            </div> --}}
                            <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Age</label>
                                <div class="col-md-7">
                                    <input type="text" value="{{ calculateAge($data->dob) }} years" class="form-control"
                                        readonly="true">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Interests:</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        value="{{ implode(', ', json_decode($users->interests)) }}" readonly="true">
                                </div>
                            </div>
                            <!-- Additional user details fields -->
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- User Preference -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">User Preference</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Ethnic Group</label>

                                <div class="col-md-7">
                                    @isset($userDetails->user_pref_ethnic_group)
                                    <input type="text" class="form-control"
                                        value="{{ $userDetails->user_pref_ethnic_group }}" readonly="true">
                                    @else
                                    <input type="text" class="form-control" value="N/A" readonly="true">
                                    @endisset
                                </div>
                            </div> --}}
                            <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Gender</label>
                                {{-- <div class="col-md-7">
                                    <input type="text" class="form-control" value="{{ $userDetails->user_pref_gender }}"
                                        readonly="true">
                                </div> --}}
                                <div class="col-md-7">
                                    @isset($data->zodiac_sign_id)
                                    <input type="text" class="form-control" value="{{ $data->user_pref_gender }}"
                                        readonly="true">
                                    @else
                                    <input type="text" class="form-control" value="N/A" readonly="true">
                                    @endisset
                                </div>
                            </div>
                            {{-- <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Interests</label>

                                <div class="col-md-7">
                                    @isset($userDetails->user_pref_interests)
                                    <input type="text" class="form-control"
                                        value="{{ implode(', ', json_decode($userDetails->user_pref_interests)) }}"
                                        readonly="true">
                                    @else
                                    <input type="text" class="form-control" value="N/A" readonly="true">
                                    @endisset
                                </div>
                            </div> --}}
                            <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Age</label>
                                {{-- <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        value="{{ $userDetails->age_min }} - {{ $userDetails->age_max }}"
                                        readonly="true">
                                </div> --}}
                                <div class="col-md-7">
                                    @isset($data->age_min, $data->age_max)
                                    <input type="text" class="form-control"
                                        value="{{ $data->age_min }} - {{ $data->age_max }}" readonly="true">
                                    @else
                                    <input type="text" class="form-control" value="N/A" readonly="true">
                                    @endisset
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Interests:</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        value="{{ implode(', ', json_decode($user->interests)) }}" readonly="true">
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row mb-3">
                                <label class="col-md-5 col-form-label">Age:</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        value="{{ $user->age_min }} - {{ $user->age_max }}" readonly="true">
                                </div>
                            </div> --}}
                            <!-- Additional user preference fields -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>