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

                        <div class="col-md-2 mt-3 text-center">
                            <div class="form-group">
                                <div class="image-upload">
                                    {{-- <img class="img-circle rounded-circle img-fluid" src="{{ $profileImage}}"
                                        onerror="this.src='DefaultImage/pngfind.com-profile-icon-png-804674.png'"
                                        style="max-width: 120px; height: 120px; object-fit: cover;"> --}}
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
                                <div class="col-md-7">
                                    <input type="text" value="{{ $data->personal_pronounce }}" class="form-control"
                                        readonly="true">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Zoadic Sign</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ $data->zodiac_sign_id }}" class="form-control"
                                        readonly="true">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Registered On</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ $data->created_datetime }}" class="form-control"
                                        readonly="true">
                                </div>
                            </div>
                            <!-- Additional personal details fields -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
