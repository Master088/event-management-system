<template>
  <div class="container p-5">
    <div class="fluid-container">
        <div class="row">
            <div class="col">
                <h1 class="display-2">{{ event.title }}</h1>
                <small>Date posted: {{ event.created_at }}</small>
                <div class="card mt-2 border-0">
                    <div class="row g-0">
                        <div class="col-sm-3 img-container d-flex justify-content-center">
                            <img :src="event.profile_picture" class="img-fluid profile-img mt-1" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body mt-2">
                                <h5 class="card-title">{{ event.fullname }}</h5>
                                <p class="card-text"><small class="text-muted">{{event.role}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col border rounded p-2 d-flex align-items-center bg-light">
                    STATUS: {{ event.is_canceled?"canceled":"Soon" }}
                </div> -->
            </div>
            <div class="col-auto">
                <p>Date: <b>{{ event.date }}</b> </p>
                <p>Time: <b>{{ event.time }}</b></p>
            </div>

            <div class="col-md-12">
                    <div class="modal fade" id="cancelEvent" tabindex="-1" role="dialog" aria-labelledby="cancelEvent" aria-hidden="true">
                        <div class="modal-dialog">
                            <form  @submit.prevent="handleCancelEvent">  
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg text-white" ></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <i class="bi bi-exclamation-circle-fill text-danger justify-content-center d-flex"></i>
                                        <div class="col content-modal">
                                            <h4 class="justify-content-center d-flex fw-semibold ">Cancel Event</h4>
                                            <p class="justify-content-center d-flex text-black-50">Are you sure you want to cancel this event?</p>
                                        </div>
                                     
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger px-4"  v-show="loading">
                                             Yes
                                            <span
                                                    v-show="loading"
                                                    class="spinner-border spinner-border-sm"
                                            ></span>
                                        </button>
                                        <button type="submit" class="btn btn-danger px-4"  v-show="!loading">
                                           Yes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

            <div class="col-md-12">
                    <div class="modal fade" id="openEvent" tabindex="-1" role="dialog" aria-labelledby="openEvent" aria-hidden="true">
                        <div class="modal-dialog">
                            <form  @submit.prevent="handleOpenEvent">  
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg text-white"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <i class="bi bi-question-circle-fill text-primary justify-content-center d-flex"></i>
                                        <div class="col content-modal">
                                            <h4 class="justify-content-center d-flex fw-semibold ">Event Confirmation</h4>
                                            <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to re open this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary px-4"  v-show="loading">
                                             Yes
                                            <span
                                                    v-show="loading"
                                                    class="spinner-border spinner-border-sm"
                                            ></span>
                                        </button>
                                        <button type="submit" class="btn btn-primary px-4"  v-show="!loading">
                                           Yes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

            <div class="col-md-12">
                    <div class="modal fade" id="registrationConfirmation" tabindex="-1" role="dialog" aria-labelledby="registrationConfirmation" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <form  @submit.prevent="handleRegister">  
                                <div class="modal-content">
                                    <div class="modal-header text-white bg-primary">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn" aria-label="Close">
                                        <span aria-hidden="true" data-bs-dismiss="modal"><i class="bi bi-x-lg text-white"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <i class="bi bi-question-circle-fill text-primary justify-content-center d-flex"></i>
                                        <div class="col content-modal">
                                            <h4 class="justify-content-center d-flex fw-semibold ">Register Confirmation</h4>
                                            <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to register this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        
                                        <button type="button" class="btn btn-primary px-4"  v-show="loading">
                                            Register
                                            <span
                                                    v-show="loading"
                                                    class="spinner-border spinner-border-sm"
                                            ></span>
                                        </button>
                                        <button type="submit" class="btn btn-primary px-4"  v-show="!loading">
                                        Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

            <div class="col-md-12">
                    <div class="modal fade" id="approveConfirmation" tabindex="-1" role="dialog" aria-labelledby="registrationConfirmation" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <form  @submit.prevent="handleAprove">  
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg text-white"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <i class="bi bi-check-circle-fill text-primary justify-content-center d-flex"></i>
                                        <div class="col content-modal">
                                            <h4 class="justify-content-center d-flex fw-semibold ">Approve Confirmation</h4>
                                            <p class=" text-black-50 mt-3">Are you sure you want to approve <b>{{ event_registration_info.fullname }}'s</b> to this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                       
                                        <button type="button" class="btn btn-primary px-4"  v-show="loading">
                                            Approve
                                            <span
                                                    v-show="loading"
                                                    class="spinner-border spinner-border-sm"
                                            ></span>
                                        </button>
                                        <button type="submit" class="btn btn-primary px-4"  v-show="!loading">
                                            Approve
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

            <div class="col-md-12">
                    <div class="modal fade" id="unapproveConfirmation" tabindex="-1" role="dialog" aria-labelledby="registrationConfirmation" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <form  @submit.prevent="handleDecline">  
                                <div class="modal-content">
                                    <div class="modal-header bg-info text-white">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg text-white"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <i class="bi bi-exclamation-circle-fill text-info justify-content-center d-flex"></i>
                                        <div class="col content-modal">
                                            <h4 class="justify-content-center d-flex fw-semibold ">Unapproved Confirmation</h4>
                                            <p class="text-black-50 mt-3">Are you sure you want to unapproved <b> {{ event_registration_info.fullname }}'s </b> to this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        
                                        <button type="button" class="btn btn-info px-4 text-white"  v-show="loading">
                                            Unapproved
                                            <span
                                                    v-show="loading"
                                                    class="spinner-border spinner-border-sm"
                                            ></span>
                                        </button>
                                        <button type="submit" class="btn btn-info px-4 text-white"  v-show="!loading">
                                            Unapproved
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

            
            <div class="col-md-12">
                    <div class="modal fade" id="deleteRegistration" tabindex="-1" role="dialog" aria-labelledby="deleteRegistration" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <form  @submit.prevent="handleDelete">  
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg text-white"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <i class="bi bi-exclamation-circle-fill text-danger justify-content-center d-flex"></i>
                                            <div class="col content-modal">
                                                <h4 class="justify-content-center d-flex fw-semibold ">Delete Registration</h4>
                                                <p class=" text-black-50">Are you sure you want to delete <b>{{ event_registration_info.fullname }}'s registration</b> to this event?</p>
                                            </div>
                                      
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                       
                                        <button type="button" class="btn btn-danger px-4"  v-show="loading">
                                            Delete
                                            <span
                                                    v-show="loading"
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
            </div>

            <div class="col-md-12">
                    <div class="modal fade" id="deniedConfirmation" tabindex="-1" role="dialog" aria-labelledby="registrationConfirmation" aria-hidden="true">
                        <div class="modal-dialog">
                            <form  @submit.prevent="handleDecline">  
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-white">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg text-white"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <i class="bi bi-exclamation-circle-fill text-warning justify-content-center d-flex"></i>
                                         <div class="col content-modal">
                                            <h4 class="justify-content-center d-flex fw-semibold ">Denied Confirmation</h4>
                                            <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to denied <pre> <b>{{ event_registration_info.fullname }}'s</b> </pre> to this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                         
                                        <button type="button" class="btn btn-warning px-4 text-white"  v-show="loading">
                                            Denied
                                            <span
                                                    v-show="loading"
                                                    class="spinner-border spinner-border-sm"
                                            ></span>
                                        </button>
                                        <button type="submit" class="btn btn-warning px-4 text-white"  v-show="!loading">
                                            Denied
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

          </div>  
        </div>
        <hr>
        <div class="fluid-container">
           
            <div>
                <p align="justify" >{{ event.description }}</p>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <div class="col-auto">   
                       
                    <button v-if="event.is_canceled" type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#openEvent">
                        Open Event
                    </button>
                    <button v-if="!event.is_canceled"   v-show="user?.role=='admin'" type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#cancelEvent">
                        Cancel Event
                    </button>

                    <button v-if="!event.is_canceled" type="button" class="btn btn-primary mx-2 px-5" data-bs-toggle="modal" data-bs-target="#registrationConfirmation">
                        Register
                    </button>  
                    <button v-if="event.is_canceled" type="button" class="btn btn-warning mx-2 px-5">
                        Register(Event Canceled)
                    </button>  
                </div>
            </div>
        </div>
        <div class="fluid-container mt-4"  v-if="user?.role=='admin' || user?.role=='teacher' ">
            <hr>
            <h3>Registered Students</h3>
            <div class="col-md-12 d-flex justify-content-end">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#student_register" @click="getUnregisteredStudents()">
                    Register Student
                </button>
            </div>
            <div class="modal fade" id="student_register" tabindex="-1" aria-labelledby="student_register" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Register Student</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2 ">
                                <div class="container pt-2">
                                    <div class="input-group search">
                                        <input
                                        type="text"
                                        class="form-control shadow"
                                        placeholder="Search..."
                                        aria-label="Search..."
                                        aria-describedby="basic-addon2"
                                        v-model="search"
                                        /><span class="input-group-text search-icon"
                                        ><i class="bi bi-search"></i
                                        ></span>
                                    </div>
                                </div>
                            </form>

                            <div class="modal-dialog-scrollable">
                            <div class="container pb-5 pt-1">
                                <table class="table mt-4">
                                <thead>
                                    <tr>
                                    <th scope="col">
                                        <label>
                                            <input  type="checkbox" class="form-check-input" @click="selectAll" v-model="allSelected"> Check All
                                        </label>
                                    </th>
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Section</th>
                                   
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr v-show="!loading2" v-for="user in unregistered_student" :key="user.id">
                                        <th scope="row">
                                            <label>
                                                <input  type="checkbox" class="form-check-input" ref="test" @click="addRemoveId($event,user.id)">
                                            </label>
                                        </th>
                                        <td>{{ user.id_number }}</td>
                                        <td>{{ user.fullname }}</td>     
                                        <td>{{ user.section }}</td>
                                    </tr>
                                    <tr v-show="loading2"  >
                                        <th></th>
                                        <th></th>
                                        <th scope="row">
                                            <span class="spinner-border spinner-border-sm" ></span>
                                        </th>
                                        <th></th>
                                    </tr>
                                   
                                </tbody>
                             
                                </table>
                           </div>
            
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button v-show="loading" type="button" class="btn btn-success">Register   <span class="spinner-border spinner-border-sm" ></span></button>
                            <button v-show="!loading" type="button" class="btn btn-success"  @click="handleRegisterStudents">Register </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container text-center mt-5">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-content">
                                    <div class="card-body">
                                    <div class="media">
                                        <div class="media-body text-left">
                                        
                                         <div class="row">
                                            <div class="col-auto me-auto mt-3 text-success fw-light">
                                                <h2>{{ event_registrations_count.approve }}</h2>
                                            </div>
                                            
                                        </div>
                                        <div class="col mt-2 d-flex justify-content-start ">
                                               <h5><b>  Approve </b></h5>
                                           
                                        </div>
                                        </div>
                                        
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col">
                                <div class="card shadow">
                                    <div class="card-content">
                                        <div class="card-body">
                                        <div class="media">
                                            <div class="media-body text-left">
                                        
                                             <div class="row">
                                                <div class="col-auto me-auto mt-3 text-danger fw-light">
                                                    <h2>{{ event_registrations_count.denied }}</h2>
                                                </div>
                                            
                                            </div>
                                            <div class="col mt-2 d-flex justify-content-start ">
                                               <h5><b>   Denied</b></h5>
                                              
                                            </div>
                                            </div>
                                        
                                        </div>
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col">
                        <div class="col">
                                <div class="card shadow">
                                    <div class="card-content">
                                        <div class="card-body">
                                        <div class="media">
                                            <div class="media-body text-left">
                                        
                                             <div class="row">
                                                <div class="col-auto me-auto mt-3 text-warning fw-light">
                                                    <h2>{{ event_registrations_count.pending }}</h2>
                                                </div>
                                            
                                            </div>
                                            <div class="col mt-2 d-flex justify-content-start ">
                                               <h5><b> Pending</b></h5>
                                            </div>
                                            </div>
                                        
                                        </div>
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="fluid-container mt-5">
                <table class="table responsive">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Section</th>
                        <th scope="col">Registration Date</th>
                        <th scope="col">Status</th>
                        <th scope="col"  v-show="user?.role=='admin'">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="registration in event_registrations" :key="registration.id">
                            <th scope="row">{{ registration.id }}</th>
                            <td>{{ registration.fullname }}</td>
                            <td>{{ registration.section }}</td>
                            <td>{{ registration.created_at }}</td>
                            <td>{{ registration.status }}</td>

                            <td v-if="registration.status=='pending'"  v-show="user?.role=='admin'">
                                <button class="btn btn-sm btn-danger" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#deleteRegistration">Delete</button>
                                <button class="btn btn-sm btn-warning text-white mx-2" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#deniedConfirmation">Denied</button>
                                <button class="btn btn-sm btn-primary mx-2" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#approveConfirmation">Approve</button>
                            </td> 
                            <td v-if="registration.status=='approve'"  v-show="user?.role=='admin'">
                                <button class="btn btn-sm btn-danger" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#deleteRegistration" >Delete</button>
                                <button class="btn btn-sm btn-info text-white mx-2" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#unapproveConfirmation">Unapproved</button>
                            </td>
                            <td v-if="registration.status=='denied'"  v-show="user?.role=='admin'">
                                <button class="btn btn-sm btn-danger" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#deleteRegistration">Delete</button>
                                <button class="btn btn-sm btn-primary mx-2" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#approveConfirmation">Approve</button>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
  </div>
  
</template>

 

<script setup>
// import store from "../store";
import { useRoute, useRouter } from "vue-router";
import { ref, computed, watchEffect, onMounted, watch } from "vue";
import {  DELETE_REGISTRATION, GET_EVENT, GET_EVENT_REGISTRATIONS, GET_UNREGISTERED_STUDENT, REGISTER, REGISTER_STUDENT, UPDATE_EVENT_REGISTRATION_STATUS, UPDATE_EVENT_STATUS } from "../store/store-constants";
import store from '../store';


const router = useRouter();

const route = useRoute();
 
const loading = ref(false);

const loading2 = ref(false);


const errorMsg = ref("");
const name=ref("")

const id = ref (route.params.id ||0);
const event = ref(computed(() => store.state.events.event))|| {};
const event_registrations = ref(computed(() => store.state.events.event_registrations))|| [];
const event_registrations_count = ref(computed(() => store.state.events.event_registrations_count))|| {};
const unregistered_student = ref([]);

const unregistered_student_data = ref(computed(() => store.state.events.unregistered_student))|| [];


const event_registration_info = ref("");

const search =  ref("");


const filterItems = (needle, heystack) => {
  let query = needle.toLowerCase();
  return heystack.filter(item => item.fullname.toLowerCase().indexOf(query) >= 0);
}

watch(search,()=>{
    console.log("search.value",search.value)
    if(search.value.length>0){ 
        console.log(filterItems(search.value,unregistered_student_data.value))
        unregistered_student.value=filterItems(search.value,unregistered_student_data.value)
    }else{
        unregistered_student.value=[...unregistered_student_data.value]
    }
})

 

const user = ref(computed(() => store.state.auth.user))|| {
  fullname:"user"
};

const addRegisterIds=ref([])


const addRemoveId=(event,id)=>{
   console.log(event.target)
   
    var status =0;

    status =1;
    for (var i = 0; i < addRegisterIds.value.length; i++) {
        console.log("here",id,addRegisterIds.value[i])
        if (addRegisterIds.value[i] == id) {
            status = 0;
            break;
        }
    }

    if(status==1){
        addRegisterIds.value.push(id)
    }else{
        addRegisterIds.value=addRegisterIds.value.filter(x => x !=id)
    }
    
   
   console.log("ids",addRegisterIds.value)
}


const handleRegisterStudents= ()=>{
        console.log("hello here 131")
    if(addRegisterIds.value.length>0){
        loading.value=true
        console.log(addRegisterIds.value.length)
   /** set validation later */
   for (var i = 0; i < addRegisterIds.value.length; i++) {
            store
            .dispatch(`events/${REGISTER_STUDENT}`, {
                event_id:id.value,
                user_id:addRegisterIds.value[i]
            })
            .then((data) => {
            loading.value = false;
             $('#student_register').modal('hide')
                
            })
            .catch((err) => {
            console.log("error", err);
            loading.value = false;
            
            });
    }

    }
    
}



const getEvent=()=>{
  console.log("helo",id.value)
  store
    .dispatch(`events/${GET_EVENT}`, {
      id:id.value
    })
    .then(() => {
      // loading.value = false;
      //   console.log("data here ", data.data);
    })
    .catch((err) => {
      console.log("error", err);
      // loading.value = false;
      //   errorMsg.value = err.response.data.error;
    });
   
   
}


const getUnregisteredStudents=()=>{
    addRegisterIds.value=[]
    loading2.value=true
  store
    .dispatch(`events/${GET_UNREGISTERED_STUDENT}`, {
      id:id.value
    })
    .then((data) => {
    loading2.value=false
    console.log("here data",data.students)
    unregistered_student.value=data.students
      // loading.value = false;
      //   console.log("data here ", data.data);
    })
    .catch((err) => {
      console.log("error", err);
      loading2.value=false

    });
   
   
}


const getEventRegistrations=()=>{
  console.log("helo",id.value)
  store
    .dispatch(`events/${GET_EVENT_REGISTRATIONS}`, {
      id:id.value
    })
    .then((data) => {
      // loading.value = false;
        console.log("data here ", data);
    })
    .catch((err) => {
      console.log("error", err);
      // loading.value = false;
      //   errorMsg.value = err.response.data.error;
    });
   
   
}




const handleRegister= ()=>{
     
     loading.value=true
   /** set validation later */
   
     store
     .dispatch(`events/${REGISTER}`, {
        event_id:id.value,
     })
     .then((data) => {
       loading.value = false;
       $('#registrationConfirmation').modal('hide')
         
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
     
     });
}


const handleCancelEvent= ()=>{
     
    loading.value=true
   /** set validation later */
     errorMsg.value=""
     store
     .dispatch(`events/${UPDATE_EVENT_STATUS}`, {
        id:id.value,
        data:{
            is_canceled:1
        },
        old_status:event_registration_info.value.status,
     })
     .then((data) => {
      
       loading.value = false;
       $('#cancelEvent').modal('hide')

         console.log("data here ", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       //   errorMsg.value = err.response.data.error;
     });

}

const handleOpenEvent= ()=>{
     
    loading.value=true

   /** set validation later */
     errorMsg.value=""
     store
     .dispatch(`events/${UPDATE_EVENT_STATUS}`, {
        id:id.value,
        data:{
            is_canceled:0
        },
        old_status:event_registration_info.value.status,
     })
     .then((data) => {
      
       loading.value = false;
       $('#openEvent').modal('hide')

         console.log("data here ", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
    
     });

}

const handleAprove= ()=>{
     
    loading.value =true;
    
   /** set validation later */
     errorMsg.value=""
     store
     .dispatch(`events/${UPDATE_EVENT_REGISTRATION_STATUS}`, {
        id:event_registration_info.value.id,
        data:{
            status:"approve"
        },
        old_status:event_registration_info.value.status,
     })
     .then((data) => {
        $('#approveConfirmation').modal('hide')
       loading.value = false;
         console.log("data here ", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       
     });

}

const handleDecline= (data)=>{
    loading.value = true;
     
     errorMsg.value=""
     store
     .dispatch(`events/${UPDATE_EVENT_REGISTRATION_STATUS}`, {
        id:event_registration_info.value.id,
        data:{
            status:"denied"
        },
        old_status:event_registration_info.value.status,
     })
     .then((data) => {
       
       loading.value = false;
   
       $('#deniedConfirmation').modal('hide')
       $('#unapproveConfirmation').modal('hide')
       
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
     
     });

}

const handleDelete= ()=>{
     
    loading.value=true
   
     store
     .dispatch(`events/${DELETE_REGISTRATION}`, {
        id:event_registration_info.value.id,
        type:event_registration_info.value.status,
     })
     .then((data) => {
      
       loading.value = false;
    
       $('#deleteRegistration').modal('hide')
         
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
     
     });

}

watchEffect(() => getEvent())

watchEffect(() => getEventRegistrations())

watchEffect(() => getUnregisteredStudents())



</script>



<style scoped>
.bi-exclamation-circle-fill, .bi-question-circle-fill, .bi-check-circle-fill{
    font-size: 110px;
    /* border: solid 1px blue; */
    width: fit-content;
    margin-left: 35%;
    padding: 10px;
    margin-top: -15%;
    margin-bottom: 5%;
    background-color: #fff;
    border-radius: 50%;
    position: absolute;
  }
  .content-modal{
    margin-top: 10vh;
  }
  .profile-img{
    height: 90% !important;
    /* width: 100%; */
    /* object-fit: cover; */
    border-radius: 50%;
    
  }
  .img-container{
    width: 80px;
    height: 80px;
  }
  .search{
    max-width: 500px;
  }
</style>