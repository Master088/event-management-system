<template>
  <div class="container p-5">
    <div class="fluid-container">
        <div class="row">
            <div class="col-auto me-auto">
                <h1 class="display-2">{{ event.title }}</h1>
                <small>Date posted: {{ event.created_at }}</small>
                <div class="card mb-2 border-0 mt-4" style="width: 18rem;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../assets/logos/clsu-logo.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text"><small class="text-muted">Teacher</small></p>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Cancel Event</h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg text-white"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col">
                                            <i class="bi bi-exclamation-circle-fill text-danger justify-content-center d-flex"></i>
                                            <p class="justify-content-center d-flex ">Are you sure you want to cancel this event?</p>
                                        </div>
                                     
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger px-4">Yes</button> 
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
                                        <div class="col">
                                            <i class="bi bi-question-circle-fill text-primary justify-content-center d-flex"></i>
                                            <h4 class="justify-content-center d-flex fw-semibold ">Event Confirmation</h4>
                                            <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to re open this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary px-4">Yes</button> 
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
                                        <div class="col">
                                            <i class="bi bi-question-circle-fill text-primary justify-content-center d-flex"></i>
                                            <h4 class="justify-content-center d-flex fw-semibold ">Register Confirmation</h4>
                                            <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to register this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary px-4">Register</button> 
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
                                        <div class="col">
                                            <i class="bi bi-check-circle-fill text-primary justify-content-center d-flex"></i>
                                            <h4 class="justify-content-center d-flex fw-semibold ">Approve Confirmation</h4>
                                            <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to approve <pre> <b>{{ event_registration_info.fullname }}'s</b> </pre> to this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary px-4">Approve</button> 
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
                                        <div class="col">
                                            <i class="bi bi-exclamation-circle-fill text-info justify-content-center d-flex"></i>
                                            <h4 class="justify-content-center d-flex fw-semibold ">Unapproved Confirmation</h4>
                                            <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to unapproved <pre><b> {{ event_registration_info.fullname }}'s </b></pre> to this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info px-4 text-white">Unapproved</button> 
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
                                    <div class="modal-header ">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Registration</h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Are you sure you want to delete <span><b>{{ event_registration_info.fullname }}'s registration</b></span> to this event?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary px-4">Delete</button> 
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
                                         <div class="col">
                                            <i class="bi bi-exclamation-circle-fill text-warning justify-content-center d-flex"></i>
                                            <h4 class="justify-content-center d-flex fw-semibold ">Denied Confirmation</h4>
                                            <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to denied <b><pre>{{ event_registration_info.fullname }}'s</pre></b> to this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-warning text-white px-4">Denied</button> 
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
                    <button v-if="!event.is_canceled" type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#cancelEvent">
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
        <div class="fluid-container mt-4">
            <hr>
            <h3>Registered Students</h3>
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
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="registration in event_registrations" :key="registration.id">
                            <th scope="row">{{ registration.id }}</th>
                            <td>{{ registration.fullname }}</td>
                            <td>{{ registration.section }}</td>
                            <td>{{ registration.created_at }}</td>
                            <td>{{ registration.status }}</td>

                            <td v-if="registration.status=='pending'">
                                <button class="btn btn-sm btn-danger" @click="()=>event_registration_info=registration">Delete</button>
                                <button class="btn btn-sm btn-warning text-white mx-2" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#deniedConfirmation">Denied</button>
                                <button class="btn btn-sm btn-primary mx-2" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#approveConfirmation">Approve</button>
                            </td> 
                            <td v-if="registration.status=='approve'">
                                <button class="btn btn-sm btn-danger" @click="()=>event_registration_info=registration">Delete</button>
                                <button class="btn btn-sm btn-info text-white mx-2" @click="()=>event_registration_info=registration" data-bs-toggle="modal" data-bs-target="#unapproveConfirmation">Unapproved</button>
                            </td>
                            <td v-if="registration.status=='denied'">
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
import { ref, computed, watchEffect } from "vue";
import {  DELETE_REGISTRATION, GET_EVENT, GET_EVENT_REGISTRATIONS, REGISTER, UPDATE_EVENT_REGISTRATION_STATUS, UPDATE_EVENT_STATUS } from "../store/store-constants";
import store from '../store';


const router = useRouter();

const route = useRoute();
 
let loading = ref(false);
let errorMsg = ref("");
const name=ref("")

const id = ref (route.params.id ||0);
const event = ref(computed(() => store.state.events.event))|| {};
const event_registrations = ref(computed(() => store.state.events.event_registrations))|| [];
const event_registrations_count = ref(computed(() => store.state.events.event_registrations_count))|| {};

const event_registration_info = ref("");


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
     
     console.log(event.value)
   /** set validation later */
     errorMsg.value=""
     store
     .dispatch(`events/${REGISTER}`, {
        event_id:id.value,
     })
     .then((data) => {
        //  eventDataHolder.value=events.value
        //  eventDataDisplay.value=eventDataHolder.value.slice(0,5)
         
        //  pagination.value.currentPage=1

        //  pagination.value.totalEvents=eventDataHolder.value.length
        //  pagination.value.totalPages=parseInt(eventDataHolder.value.length/5)

        //  if(eventDataHolder.value.length%5!==0){
        //      pagination.value.totalPages+=1;
        //  }
        //  event.value = ref({
        //      title:"",
        //      date:null,
        //      location:"",
        //      start:"1 am",
        //      end:"2 am",
        //      description:""
        //  });

       // loading.value = false;
         console.log("data here ", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       //   errorMsg.value = err.response.data.error;
     });

  

   // this.yearValidation = this.year.length < 4 || this.year.length > 4 ? 'The year must at least 4 number only' : ''
  
}


const handleCancelEvent= ()=>{
     
     console.log(event.value)
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
      
       // loading.value = false;
         console.log("data here ", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       //   errorMsg.value = err.response.data.error;
     });

}

const handleOpenEvent= ()=>{
     
     console.log(event.value)
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
      
       // loading.value = false;
         console.log("data here ", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       //   errorMsg.value = err.response.data.error;
     });

}

const handleAprove= ()=>{
     
     console.log(event.value)
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
       // loading.value = false;
         console.log("data here ", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       //   errorMsg.value = err.response.data.error;
     });

}

const handleDecline= ()=>{
     
     console.log(event.value)
   /** set validation later */
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
        document.getElementById('close').click();
       // loading.value = false;
         console.log("data here ", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       //   errorMsg.value = err.response.data.error;
     });

}

const handleDelete= ()=>{
     
     console.log(event.value)
   /** set validation later */
     errorMsg.value=""
     store
     .dispatch(`events/${DELETE_REGISTRATION}`, {
        id:event_registration_info.value.id,
        type:event_registration_info.value.status,
     })
     .then((data) => {
      
       // loading.value = false;
         console.log("data here ", data.data);
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       //   errorMsg.value = err.response.data.error;
     });

}

watchEffect(() => getEvent())

watchEffect(() => getEventRegistrations())


</script>



<style>
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
  }
</style>