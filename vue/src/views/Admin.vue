<template>
  <div class="fluid-container p-5">
    <div class="row">
        <div class="col-md-7 me-auto">
            <h1>Admin</h1>
        </div>
        <div class="row justify-content-end m-0 p-0">
            <div class="col-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                    <i class="bi bi-plus-circle"></i> Add New Record
                </button>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#update">
                    <i class="bi bi-pencil-square"></i> Update
                </button>
            </div>
      </div>
    </div>
    <!-- add modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addr" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="addr">Add Record</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
                <div class="row justify-content-start">
                    <div class="col-4">
                        <div class="imagePreviewWrapper" :style="{ 'background-image': `url(${previewImage})` }" @click="selectImage"> </div>
                    </div>
                    <div class="col mt-5">
                        <input ref="fileInput" type="file" class="form-control" id="customFile" @input="pickFile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control" id="fullname">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="cp">Cellphone No.</label>
                    <input type="text" class="form-control" id="cp">
                    </div>
                </div>
                 <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email">             
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sex">Gender</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>   
                 </div> 
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword">
                    </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add Record</button>
          </div>
        </div>
      </div>
    </div>
    <!-- update modal -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="addr" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="addr">Add Record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                    <div class="row justify-content-start">
                        <div class="col-4">
                            <div class="imagePreviewWrapper" :style="{ 'background-image': `url(${previewImage})` }" @click="selectImage"> </div>
                        </div>
                        <div class="col mt-5">
                            <input ref="fileInput" type="file" class="form-control" id="customFile" @input="pickFile"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" id="fullname">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="cp">Cellphone No.</label>
                        <input type="text" class="form-control" id="cp">
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email">             
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sex">Gender</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>   
                     </div> 
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword">
                        </div>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Record</button>
              </div>
            </div>
          </div>
        </div>
    <div class="border p-2 mt-5">
        <div class="mt-5">
            <table class="table responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Cellphone Number</th>
                  <th scope="col">Gender</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Jonh Doe Dimagiba</td>
                  <td>John@email.com</td>
                  <td>0912</td>
                  <td>Male</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                      <td>Jonh Doe Dimagiba</td>
                      <td>John@email.com</td>
                      <td>0912</td>
                      <td>Male</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                      <td>Jonh Doe Dimagiba</td>
                      <td>John@email.com</td>
                      <td>0912</td>
                      <td>Male</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            previewImage: null
        };
    },
    methods: {
        selectImage() {
            this.$refs.fileInput.click()
        },
        pickFile() {
            let input = this.$refs.fileInput
            let file = input.files
            if (file && file[0]) {
                let reader = new FileReader
                reader.onload = e => {
                    this.previewImage = e.target.result
                }
                reader.readAsDataURL(file[0])
                this.$emit('input', file[0])
            }
        }
    }
}
</script>

<style scope>
.imagePreviewWrapper {
    /* width: 110px; */
    height: 150px;
    margin: 10px;
    display: block;
    cursor: pointer;
    background-size: cover;
    background-position: center center;
    margin: 0 auto 30px;
    border-radius: 7px;
}
</style>