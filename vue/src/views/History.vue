<template>
  <div class="fluid-container p-5">
    <div class="row">
        <div class="col-md-7 me-auto">
            <h1>My Event History</h1>
        </div>
        
    </div>
     
    <div class="border rounded p-2 mt-5">
        <div class="mt-5">
            <table class="table responsive">
              <thead>
                <tr>
                  <th scope="col">Registration Id</th>
                  <th scope="col">Event Name</th>
                  <th scope="col">Registration Status</th>
                  <th scope="col">Registration date</th>
                  <th scope="col">View</th>
                </tr>
              </thead>
              <tbody>
                <tr  v-for="registration in registrations" :key="registration.registration_id">
                  <th scope="row">{{ registration.registration_id }}</th>
                  <td>{{ registration.title }}</td>
                  <td>{{ registration.registration_status }}</td>
                  <td>{{ registration.registration_date}}</td>
                  <td><button class="btn btn-sm btn-primary"  @click="redirect( registration.event_id)" >View</button></td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
   
  </div>
</template>


<script setup>
import { computed, onMounted, ref, watchEffect } from "vue";
import { useRouter } from "vue-router";
import store from "../store";
import {   GET_USER_EVENT_HISTORY, } from "../store/store-constants";
 
 
const loading=ref(false)

const registrations = ref(computed(() => store.state.events.event_history))|| [];
 
const router = useRouter();
 
const redirect=(id)=>{
  router.push(`/event/${id}`)
}

const getUserHistory=()=>{
        
        store
            .dispatch(`events/${GET_USER_EVENT_HISTORY}`, {
            role:"student"
            })
            .then((data) => {
            // loading.value = false;
                console.log("data here ", data);
            })
            .catch((err) => {
            console.log("error", err);
            
            });
}
 
 
 

watchEffect(() => getUserHistory())

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