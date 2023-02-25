<template>
  <div class="container p-5">
    <div class="fluid-container">
        <div class="row">
            <div class="col-auto me-auto">
                <h1>{{ event.title }}</h1>
                <div class="col border rounded p-2 d-flex align-items-center bg-light">
                    STATUS: {{ event.is_canceled?"canceled":"Soon" }}
                </div>
            </div>
            <div class="col-auto">
                <p>Date:{{ event.date }}</p>
                <p>Time:{{ event.time }}</p>
            </div>
          </div>  
        </div>
        <div class="fluid-container">
            <div class="mt-3">
                <p align="justify" >{{ event.description }}</p>
            </div>
            <div class="d-flex justify-content-end">
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
                        <div class="col border justify-content-center rounded p-2 d-flex align-items-center bg-light">
                            Total: 0
                        </div>
                    </div>
                    <div class="col">
                        <div class="col border justify-content-center rounded p-2 d-flex align-items-center bg-light">
                            Denied: 0
                        </div>
                    </div>
                    <div class="col">
                        <div class="col border justify-content-center rounded p-2 d-flex align-items-center bg-light">
                            Approved: 0
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