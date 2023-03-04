<template>
    <div class="fluid-container p-5">
      <div class="row">
          <div class="col-md-7 me-auto">
              <h1>Teacher</h1>
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

const users = ref(computed(() => store.state.users.teachers))|| [];
    
const usersData=ref({
    profile_picture:null,
    fullname:"",
    cellphone_number:"",
    email:"",
    gender:"male",
    role:"teacher",
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
    role:"teacher",
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
        role:"teacher"
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