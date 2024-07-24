
   <div class="modal fade" id="userFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

        <div class="modal-body">
             <form id="userForm">
                        @csrf
                        <div class="row d-flex">

         <div class=""> <label  for="country">Banner Name</label><span style="color: red !important; display: inline; float: none;">*</span>

         <select id="country" name="country" class="form-control">

                                </select>

                            </div>



            <div class="my-2"> <label  for="country">Banner Image</label><span style="color: red !important; display: inline; float: none;">*</span>

            <select id="country" name="country" class="form-control">

                                </select>
                            </div>
      <div class="my-2"> <label  for="country">Tagline For the Banner</label>
      <input type ="text" name ="" placeholder = "Tagline for the banner"/>
        <span style="color: red !important; display: inline; float: none;">*</span>

         <select id="country" name="country" class="form-control">
            <option value="654373">654373</option>

         </select>
        </div>

        <div class="col-6 md:col-12 my-2"> <label  for="country">Publish</label><span style="color: red !important; display: inline; float: none;">*</span>
            <select id="country" name="country" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>

             </select>
        </div>


<div class="col-6 md:col-12 my-2"> <label  for="country">Upload The Banner</label><span style="color: red !important; display: inline; float: none;">*</span>
            <input type="file"/>
