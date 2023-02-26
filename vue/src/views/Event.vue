<template>
  <div class="container p-5">
        <div class="fluid-container">
            <div class="row">
                
           
                <div class="col-md-7 me-auto">
                    <h1>Event</h1>
                </div>
                <div class="col-md-5 me-auto d-flex justify-content-end" style="height: 40px;">
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
                                            <label for="title">Location</label>
                                            <input v-model="event.location" type="text" class="form-control" id="location" required>
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
                            v-model="search"
                            /><span class="input-group-text search-icon"
                            ><i class="bi bi-search"></i
                            ></span>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        
        <div v-for="event in eventData" :key="event.id" class="fluid-container mt-5" >
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

                                        <div class="col-auto me-auto">
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
        <div class="container py-5">
            <div
                class="px-2 pb-2 table-pagination "
                style="margin-top: -40px; width: 100%"
            >
                <div class="d-flex align-items-center pagination-label">
                Showing {{ pagination.firstVal }} to {{ pagination.secondVal }} of
                {{ pagination.totalEvents }}
                </div>

                <!-- Imported Pagination Component -->
                <Pagination
                :maxVisibleButtons="pagination.maxVisibleButtons"
                :totalPages="pagination.totalPages"
                :perPage="pagination.perPage"
                :currentPage="pagination.currentPage"
                @pagechanged="getPage"
                class="d-flex justify-content-end float-end"
                style="width: fit-content; margin-left: 0px"
                v-if="pagination.totalEvents >= 5"
                >
                </Pagination>
            </div>
        </div>
    </div>
</template>

 
<script setup>
// import store from "../store";
import { useRouter } from "vue-router";
import { ref, computed, watchEffect, watch } from "vue";
import { ADD_EVENT_ACTION, FETCH_EVENTS} from "../store/store-constants";
import store from '../store';
import Pagination from '../components/Pagination.vue'

const router = useRouter();

const events = ref(computed(() => store.state.events.events))|| [];

const eventData =  ref([]);

const search =  ref("");
 
const pagination = ref({
        maxVisibleButtons: 5,
        totalPages: 1,
        perPage: 5,
        currentPage: 1,
        totalEvents: 5,
        showPagination: true,
        firstVal: 1,
        secondVal: 5
      })


      const getPage = page => {
        pagination.value.currentPage = page

        // pagination.value.totalEvents = 100
        // pagination.value.totalPages = 100 / 5

        console.log({page})
        setPageNumbers()
      }


 // Method for changing number values in "showing X to X of X" on pagination
 const setPageNumbers = () => {
        let val1 = 1
        let val2 = 5

        val2 = val2 * pagination.value.currentPage
        val1 = val2 - 4

        pagination.value.firstVal = val1
        pagination.value.secondVal = val2
        console.log(val1,val2)
        console.log(events.value.slice(val1,val2))
        
        eventData.value=events.value.slice(val1-1,val2)

        console.log("events",events.value)

        if (pagination.value.totalEvents < 5) {
          pagination.value.secondVal = pagination.value.totalEvents
        } else if (pagination.value.firstVal + 5 > pagination.value.totalEvents) {
          pagination.value.secondVal = pagination.value.totalEvents
        }
      }

let loading = ref(false);
let errorMsg = ref("");

let event = ref({
    title:"",
    date:null,
    location:"",
    start:"1 am",
    end:"2 am",
    description:""
});

const searchEvents=()=>{
}

const filterItems = (needle, heystack) => {
  let query = needle.toLowerCase();
  return heystack.filter(item => item.title.toLowerCase().indexOf(query) >= 0);
}

watch(search,()=>{
    console.log("search.value",search.value)
    if(search.value.length>0){
        console.log(filterItems(search.value,events.value))
        eventData.value=filterItems(search.value,events.value)
    }else{
        eventData.value=events.value.slice(0,5)
        pagination.currentPage=1
    }
})
const getEvents=()=>{
  store
    .dispatch(`events/${FETCH_EVENTS}`, {})
    .then(data=> {
      // loading.value = false;
      console.log(data);
      eventData.value=data.events.slice(0,5)
      pagination.value.totalEvents=data.events.length
      pagination.value.totalPages=data.events.length/5
      if(data.events.length%5!==0){
        pagination.value.totalPages+=1;
      }
      console.log("data here ", data.events.length);
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
          location:event.value.location,
          description:event.value.description,
          date:event.value.date,
          time:event.value.start+"-"+event.value.end,
        })
        .then((data) => {
            event.value = ref({
                title:"",
                date:null,
                location:"",
                start:"1 am",
                end:"2 am",
                description:""
            });

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


</script>

<style>
 .pagination-label {
    color: #8b9da8;
    font: normal normal normal 14px/19px Clear Sans;
  }
</style>