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
             
        </div>
      </div>
      <!-- add modal -->
      <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addr" aria-hidden="true">
        <div class="modal-dialog modal-lg">  
        <form  @submit.prevent="handleSubmit">  
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="addr">Add Record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                
                    <div class="row justify-content-start">
                        <div class="col-4 ">
                            <!-- <div class="imagePreviewWrapper" :style="{ 'background-image': `url(${previewImage})` }" @click="selectImage"> </div> -->
                        
                        <img v-if="previewImage" :src="previewImage" id="frame" class="img-fluid image rounded-circle imagePreviewWrapper border" />
                        <img v-else src="../assets/img/default_image.png" id="frame" class="img-fluid image rounded-circle imagePreviewWrapper border" />
    
                        </div>
                        <div class="col mt-5">
                            <label for="profile">Profile Picture <span class="text-danger">*</span></label>
                            <input  type="file" accept="image/jpeg, image/png, image/jpg" class="form-control" id="customFile" @change="onFileSelected"/>
                            <div class="text-danger">
                                {{ errors.profile_picture }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fullname">Fullname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullname" v-model="usersData.fullname">
                            <div class="text-danger">
                                {{ errors.fullname }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cp">Cellphone No. <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cp" v-model="usersData.cellphone_number">
                            <div class="text-danger">
                                {{ errors.cellphone_number }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email">Email address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" v-model="usersData.email">
                            <div class="text-danger">
                                {{ errors.email }}
                            </div>             
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sex">Gender <span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" v-model="usersData.gender">
                                <option selected>Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <div class="text-danger">
                                {{ errors.gender }}
                            </div>
                        </div>   
                    </div> 
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" v-model="usersData.password">
                            <div class="text-danger">
                                {{ errors.password }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpassword">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="cpassword" v-model="usersData.password_confirmation">
                            <div class="text-danger">
                                {{ errors.password_confirmation }}
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary px-4"  v-show="loading">
                   Add record
                    <span
                            class="spinner-border spinner-border-sm"
                    ></span>
                </button>
                <button type="submit" class="btn btn-primary px-4"  v-show="!loading">
                    Add record
                </button>
                 
                </div>
            </div>
          </form>
        </div>
      </div>
      <!-- update modal -->
      <div class="modal fade" id="update" tabindex="-1" aria-labelledby="addr" aria-hidden="true">
        <div class="modal-dialog modal-lg">  
        <form  @submit.prevent="handleSubmitEdit">  
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="addr">Update Record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                
                    <div class="row justify-content-start">
                        <div class="col-4">
                            <!-- <div class="imagePreviewWrapper" :style="{ 'background-image': `url(${previewImage})` }" @click="selectImage"> </div> -->
                        
                        <img v-if="previewImageEdit" :src="previewImageEdit" id="frame" class="img-fluid image rounded-circle imagePreviewWrapper border" />
                        <img v-else :src="userDataEdit.profile_picture" id="frame" class="img-fluid image rounded-circle imagePreviewWrapper border" />
    
                        </div>
                        <div class="col mt-5">
                            <label for="profile">Profile Picture</label>
                            <input  type="file" accept="image/jpeg, image/png, image/jpg" class="form-control" id="customFile" @change="onFileSelectedEdit"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="form-control" id="fullname" v-model="userDataEdit.fullname">
                            <div class="text-danger">
                                {{ errors.fullname }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cp">Cellphone No.</label>
                            <input type="text" class="form-control" id="cp" v-model="userDataEdit.cellphone_number">
                            <div class="text-danger">
                                {{ errors.cellphone_number }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" v-model="userDataEdit.email">
                            <div class="text-danger">
                                {{ errors.email }}
                            </div>             
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sex">Gender</label>
                            <select id="inputState" class="form-control" v-model="userDataEdit.gender">
                                <option selected>Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <div class="text-danger">
                                {{ errors.gender }}
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary px-4"  v-show="loading">
                    Update Record
                    <span
                            class="spinner-border spinner-border-sm"
                    ></span>
                </button>
                <button type="submit" class="btn btn-primary px-4"  v-show="!loading">
                    Update Record
                </button>
                
                </div>
            </div>
          </form>
        </div>
      </div>
       
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
            <div class="modal-dialog">
                <form  @submit.prevent="handleDelete">  
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <i class="bi bi-exclamation-circle-fill text-danger justify-content-center d-flex"></i>
                            <div class="col content-modal">
                                <h4 class="justify-content-center d-flex fw-semibold ">Delete Account</h4>
                                <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to delete this account?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="button" class="btn btn-danger px-4"  v-show="loading">
                                Delete
                                <span
                                        class="spinner-border spinner-border-sm"
                                ></span>
                            </button>
                            <button type="submit" class="btn btn-danger px-4"  v-show="!loading">
                                Delete
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
                
      
      <div class="border rounded p-2 mt-5">
          <div class="mt-5">
              <table class="table responsive">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cellphone Number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr  v-for="user in users" :key="user.id">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.fullname }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.cellphone_number }}</td>
                    <td>{{ user.gender}}</td>
                    <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#update" @click="setUser(user)">Update</button> <button class="btn btn-sm btn-danger" @click="setUserId(user.id)" data-bs-toggle="modal" data-bs-target="#delete">Delete</button></td>
                  </tr>
                </tbody>
              </table>
          </div>
      </div>
     
    </div>
  </template>
  
  
  <script setup>
  import { computed, ref, watchEffect } from "vue";
import store from "../store";
import { ADD_EVENT_ACTION, ADD_USER, DELETE_USER, GET_USER_BY_ROLE, UPDATE_USER } from "../store/store-constants";
   
const previewImage=ref(null)
const previewImageEdit=ref(null)
const loading=ref(false)

const users = ref(computed(() => store.state.users.admins))|| [];
    
const usersData=ref({
                profile_picture:null,
                fullname:"",
                cellphone_number:"",
                email:"",
                gender:"male",
                role:"admin",
                password:"",
                id_number:"",
                section:"",
                password_confirmation:""
})
  
const userDataEdit=ref({
    profile_picture:null,
    fullname:"",
    cellphone_number:"",
    email:"",
    gender:"",
    role:"admin",
    id_number:"",
    section:"",
})

const user_id=ref("")

const errors = ref({
    profile_picture: null,
    fullname: "",
    cellphone_number: "",
    email: "",
    gender: "",
    password: "",
    id_number: "",
    section: "",
    password_confirmation: ""
})

const onFileSelected=(event)=> {
    usersData.value.profile_picture = event.target.files[0]
    previewImage.value= URL.createObjectURL(event.target.files[0])    
}
const onFileSelectedEdit=(event)=> {
    userDataEdit.value.profile_picture = event.target.files[0]
    previewImageEdit.value= URL.createObjectURL(event.target.files[0])    
}
const setUser=(data)=>{
    console.log("hello =",data)
    userDataEdit.value={
        ...data
    }
    errors.value = {
          profile_picture: null,
          fullname: "",
          cellphone_number: "",
          email: "",
          gender: "",
          password: "",
          id_number: "",
          section: "",
          password_confirmation: "",
      }
}
const setUserId=(data)=>{
    console.log("hello =",data)
    user_id.value=data
}
const getUsers=()=>{
        
    store
        .dispatch(`users/${GET_USER_BY_ROLE}`, {
        role:"admin"
        })
        .then((data) => {
        // loading.value = false;
            console.log("data here ", data);
        })
        .catch((err) => {
        console.log("error", err);
        
        });
    }
   
 const handleSubmit= ()=>{
   /** set validation later */

    let is_valid = true
    is_valid = true

    var regexPhone =  /^(?:[0-9]|\d{11})$/; 
    var regexEmail = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    var regexPassword = /^.*(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?@."]).*$/;

     if (usersData.value.profile_picture != null) {
          errors.value.profile_picture = ""
      } else {
          errors.value.profile_picture = "Please Input Profile Picture"
          is_valid = false
      }
     if (usersData.value.fullname.length > 0 && usersData.value.fullname.length < 50) {
          errors.value.fullname = ""
      } else {
          errors.value.fullname = "Please Enter your Fullname"
          is_valid = false
      }
      if (regexPhone.test(usersData.value.cellphone_number)) {
          errors.value.cellphone_number = ""
      } else {
          errors.value.cellphone_number = "Please Enter Valid Phone Number"
          is_valid = false
      }
      if (regexEmail.test(usersData.value.email)) {
          errors.value.email = ""
      } else {
          errors.value.email = "Please Enter Valid Email"
          is_valid = false
      }
      if (usersData.value.gender.length != "") {
          errors.value.gender = ""
      } else {
          errors.value.gender = "Please Enter your Gender"
          is_valid = false
      }
      if (regexPassword.test(usersData.value.password)) {
          errors.value.password = ""
      } else {
          errors.value.password = "password must be including one uppercase letter, one special character and alphanumeric characters"
          is_valid = false
      }
      if (usersData.value.password_confirmation === usersData.value.password) {
          errors.value.password_confirmation = ""
      } else {
          errors.value.password_confirmation = "Invalid Password"
          is_valid = false
      }


    if(is_valid){
        loading.value=true
        store
        .dispatch(`users/${ADD_USER}`,{
           ...usersData.value
        })
        .then((data) => {
            usersData.value={
                profile_picture:null,
                fullname:"",
                cellphone_number:"",
                email:"",
                gender:"male",
                role:"admin",
                password:"",
                id_number:"",
                section:"",
                password_confirmation:""
            }
          loading.value = false;
       $('#add').modal('hide')
            
        })
        .catch((err) => {
          console.log("error", err);
          loading.value = false;
       
         
        });   
    }
}

const handleSubmitEdit= ()=>{
    /** set validation later */
    console.log(userDataEdit.value)

    let is_valid = true
      is_valid = true

      var regexPhone = /^(?:[0-9]|\d{11})$/;
      var regexEmail = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;

   
      if (userDataEdit.value.fullname.length > 0 && userDataEdit.value.fullname.length < 50) {
          errors.value.fullname = ""
      } else {
          errors.value.fullname = "Please Enter your Fullname"
          is_valid = false
      }
      if (regexPhone.test(userDataEdit.value.cellphone_number)) {
          errors.value.cellphone_number = ""
      } else {
          errors.value.cellphone_number = "Please Enter Valid Phone Number"
          is_valid = false
      }
      if (regexEmail.test(userDataEdit.value.email)) {
          errors.value.email = ""
      } else {
          errors.value.email = "Please Enter Valid Email"
          is_valid = false
      }
      if (userDataEdit.value.gender.length != "") {
          errors.value.gender = ""
      } else {
          errors.value.gender = "Please Enter your Gender"
          is_valid = false
      }

      if(is_valid){
        loading.value=true
        var data = new FormData();
          data.append('fullname', userDataEdit.value.fullname);
          data.append('email', userDataEdit.value.email);
          data.append('cellphone_number', userDataEdit.value.cellphone_number);
          data.append('gender', userDataEdit.value.gender);

          if (previewImageEdit) {
              data.append('profile_picture', userDataEdit.value.profile_picture);
          }
          data.append('section', '');
          data.append('id_number', '');
          data.append('_method', 'PATCH');


          store
              .dispatch(`users/${UPDATE_USER}`, {
                  id: userDataEdit.value.id,
                  data
              })
              .then((data) => {
                  loading.value = false;
                 $('#update').modal('hide')
                  
                  console.log("data here ", data.data);
              })
              .catch((err) => {
                  console.log("error", err);
              });
      }
}


const handleDelete= ()=>{

   /** set validation later */
   loading.value = true;
            
     store
     .dispatch(`users/${DELETE_USER}`, {
        id:user_id.value,
        role:"admin",
     })
     .then((data) => {
        $('#delete').modal('hide')
       loading.value = false;
         console.log("data here 1", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       
     });

}

watchEffect(() => getUsers())

  </script>
  
  
  <!-- <script>
  export default {
      data() {
          return {
              previewImage: "data:image/png;base64,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"
          }
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
          },
      }
  }
  </script> -->
  
  <style scoped>
  .imagePreviewWrapper {
      /* width: 110px; */
      height: 200px;
      margin: 10px;
      display: block;
      cursor: pointer;
      background-size: cover;
      background-position: center center;
      margin: 0 auto 30px;
      border-radius: 7px;
  }
  </style>