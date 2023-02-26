<template>
  <div class="container p-5">
    <div class="fluid-container">
        <div class="row">
            <div class="col-auto me-auto">
                <h1>{{ event.title }}</h1>
                <small>Date posted: {{ event.date }}</small>
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
                <!-- <p>Date:{{ event.date }}</p> -->
                <p>Time:{{ event.time }}</p>
            </div>
          </div>  
        </div>
        <div class="fluid-container">
            <div>
                <p align="justify" >{{ event.description }}</p>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <div class="col-auto">   
                       
                    <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Cancel Event
                    </button>

                    <button type="button" class="btn btn-primary mx-2 px-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Register
                    </button>   
                </div>
            </div>
        </div>
        <div class="fluid-container mt-4">
            <h1>Registered Students</h1>
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
                                                <h2>270</h2>
                                            </div>
                                            
                                        </div>
                                        <div class="col mt-2 d-flex justify-content-start ">
                                            Total
                                        </div>
                                        </div>
                                        
                                    </div>
                                    <div class="progress mt-1 mb-0" style="height: 7px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                    <h2>92</h2>
                                                </div>
                                            
                                            </div>
                                            <div class="col mt-2 d-flex justify-content-start ">
                                                Denied
                                            </div>
                                            </div>
                                        
                                        </div>
                                        <div class="progress mt-1 mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                    <h2>200</h2>
                                                </div>
                                            
                                            </div>
                                            <div class="col mt-2 d-flex justify-content-start ">
                                                Approve
                                            </div>
                                            </div>
                                        
                                        </div>
                                        <div class="progress mt-1 mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
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
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
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
import { CREATE_FOLDER_ACTION, GET_DOCUMENTS, GET_EVENT } from "../store/store-constants";
import store from '../store';


const router = useRouter();

const route = useRoute();
 
let loading = ref(false);
let errorMsg = ref("");
const name=ref("")

const id = ref (route.params.id ||0);
const event = ref(computed(() => store.state.events.event))|| {};
 

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

watchEffect(() => getEvent())
</script>



<style>

</style>