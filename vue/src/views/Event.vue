<template>
  <div class="container p-5">
        <div class="fluid-container">
            <div class="row">
                
           
                <div class="col-md-7 me-auto">
                    <h1>Event</h1>
                </div>
                <div class="col-md-5 me-auto  d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-plus-circle"></i> Add Event
                    </button>
                </div>
              
                <div class="col-md-12">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form  @submit.prevent="handleSubmit">  
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                
                                        <div class="form-group mb-2">
                                            <label for="title">Event Title</label>
                                            <input v-model="event.title" type="text" class="form-control" id="title" required>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="date">Date</label>
                                            <input v-model="event.date" type="date" class="form-control" id="date" required>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6 form-group">
                                                <label for="start">Start</label>
                                                <select v-model="event.start" class="form-control" id="start" required>
                                                    <option>1 am</option>
                                                    <option>2 am</option>
                                                    <option>3 am</option>
                                                    <option>4 am</option>
                                                    <option>5 am</option>
                                                    <option>6 am</option>
                                                    <option>7 am</option>
                                                    <option>8 am</option>
                                                    <option>9 am</option>
                                                    <option>10 am</option>
                                                    <option>11 am</option>
                                                    <option>12 am</option>
                                                    <option>1 pm</option>
                                                    <option>2 pm</option>
                                                    <option>3 pm</option>
                                                    <option>4 pm</option>
                                                    <option>5 pm</option>
                                                    <option>6 pm</option>
                                                    <option>7 pm</option>
                                                    <option>8 pm</option>
                                                    <option>9 pm</option>
                                                    <option>10 pm</option>
                                                    <option>11 pm</option>
                                                    <option>12 pm</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="start">End</label>
                                                <select v-model="event.end" class="form-control" id="end" required>
                                                    <option>1 am</option>
                                                    <option>2 am</option>
                                                    <option>3 am</option>
                                                    <option>4 am</option>
                                                    <option>5 am</option>
                                                    <option>6 am</option>
                                                    <option>7 am</option>
                                                    <option>8 am</option>
                                                    <option>9 am</option>
                                                    <option>10 am</option>
                                                    <option>11 am</option>
                                                    <option>12 am</option>
                                                    <option>1 pm</option>
                                                    <option>2 pm</option>
                                                    <option>3 pm</option>
                                                    <option>4 pm</option>
                                                    <option>5 pm</option>
                                                    <option>6 pm</option>
                                                    <option>7 pm</option>
                                                    <option>8 pm</option>
                                                    <option>9 pm</option>
                                                    <option>10 pm</option>
                                                    <option>11 pm</option>
                                                    <option>12 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="description">Description</label>
                                            <textarea v-model="event.description" minlength="10" class="form-control" id="description" rows="8" required></textarea>
                                        </div>
                                
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary px-4">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="container-fluid p-3 d-flex justify-content-center">
                        <div class="input-group search">
                            <input
                            type="text"
                            class="form-control shadow"
                            placeholder="Search..."
                            aria-label="Search..."
                            aria-describedby="basic-addon2"
                            /><span class="input-group-text search-icon"
                            ><i class="bi bi-search"></i
                            ></span>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        
        <div v-for="event in events" :key="event.id" class="fluid-container mt-5" >
            <div  class="card mb-3 w-100"  >
                <div class="row no-gutters" >
                    <div class="col-md-2" >
                        <img src="../assets/logos/clsu-logo.png" class="card-img" alt="img" >
                    </div>
                    <div class="col h-100">
                        <div class="card-body ">
                            <div class="row">

                                <div class="col-md-6 me-auto">
                                    <h1 class="card-title" >{{event.title}}</h1>
                                </div>
                                
                                <div class="col-4 ">
                                    <div class="row ">
                                        <div class="col">
                                        <p>{{event.date}}, {{event.time}}</p>
                                        </div>

                                        <div class="col-3">
                                            <button id="action" type="button" class="btn" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots display-6 border-0" ></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="action">
                                                <a class="dropdown-item" href="#" @click="edit"><i class="bi bi-pencil-square"></i> Edit</a>
                                                <a class="dropdown-item" href="#" @click="del"><i class="bi bi-trash"></i> Delete</a>
                                                <a class="dropdown-item" href="#" @click="cancel"><i class="bi bi-x-lg"></i> Cancel</a>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text"> 
                                {{event?.description.substring(0,300)}} ...
                            </p>
                            <div class="mt-3 d-flex justify-content-end mb-0">
                                <div class="col-auto">
                                    <button type="button" class="btn btn-light border" @click="redirect(event.id)">
                                        <i class="bi bi-file-earmark-plus"></i> View More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

 
<script setup>
// import store from "../store";
import { useRouter } from "vue-router";
import { ref, computed, watchEffect } from "vue";
import { ADD_EVENT_ACTION, FETCH_EVENTS} from "../store/store-constants";
import store from '../store';

const router = useRouter();

const events = ref(computed(() => store.state.events.events))|| [];
 
 
let loading = ref(false);
let errorMsg = ref("");

let event = ref({
    title:"",
    date:null,
    start:"1 am",
    end:"2 am",
    description:""
});



const  getEvents=()=>{
  store
    .dispatch(`events/${FETCH_EVENTS}`, {})
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
 
watchEffect(() => getEvents())

const redirect=(id)=>{
  router.push(`/event/${id}`)
}

const handleSubmit= ()=>{
     
        console.log(event.value)
      /** set validation later */
      
        errorMsg.value=""
        store
        .dispatch(`events/${ADD_EVENT_ACTION}`, {
          title:event.value.title,
          description:event.value.description,
          date:event.value.date,
          time:event.value.start+"-"+event.value.end,
        })
        .then(() => {
          // loading.value = false;
          //   console.log("data here ", data.data);
        })
        .catch((err) => {
          console.log("error", err);
          loading.value = false;
          //   errorMsg.value = err.response.data.error;
        });

     

      // this.yearValidation = this.year.length < 4 || this.year.length > 4 ? 'The year must at least 4 number only' : ''
     
}


</script>

<style>

</style>