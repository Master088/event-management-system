<template>
  <div class="container p-5">
        <div class="fluid-container">
            <div class="row">      
                <div class="col-md-7 me-auto">
                    <h1>Event</h1>
                </div>
                <div class="col-md-5 me-auto d-flex justify-content-end" style="height: 40px;">
                    <button type="button" class="btn-bg-add" data-bs-toggle="modal" data-bs-target="#addEvent">
                        <i class="bi bi-plus-circle"></i> Add Event
                    </button>
                </div>          
                <div class="col-md-12">          
                    <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form  @submit.prevent="handleSubmit">  
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addEventLabel">Add Event</h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                
                                        <div class="form-group mb-2">
                                            <label for="title">Event Title</label>
                                            <input v-model="event.title" type="text" class="form-control" id="title"  >
                                            <div class="text-danger">
                                                {{ errors.title }}
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="location">Venue</label>
                                            <input v-model="event.location" type="text" class="form-control" id="location" >
                                            <div class="text-danger">
                                                {{ errors.location }}
                                            </div>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="date">Date</label>
                                            <input v-model="event.date" type="date" class="form-control" id="date"  >
                                            <div class="text-danger">
                                                {{ errors.date }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6 form-group">
                                                <label for="start">Start</label>
                                                <select v-model="event.start" class="form-control" id="start"  >
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
                                                <select v-model="event.end" class="form-control" id="end"  >
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
                                            <textarea v-model="event.description" minlength="10" class="form-control" id="description" rows="8"  ></textarea>
                                            <div class="text-danger">
                                                {{ errors.description }}
                                            </div>

                                        </div>
                                
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                             Close
                                        </button>

                                       
                                        <button type="button" class="btn-bg-save px-4"  v-show="loading">
                                            <i class="bi bi-cloud-download"></i> Save 
                                            <span
                                                    v-show="loading"
                                                    class="spinner-border spinner-border-sm"
                                            ></span>
                                        </button>
                                        <button type="submit" class="btn-bg-save px-4"  v-show="!loading">
                                            <i class="bi bi-cloud-download"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="editEventLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form  @submit.prevent="handleSubmitEdit">  
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editEventLabel">Edit Event</h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                
                                        <div class="form-group mb-2">
                                            <label for="title">Event Title</label>
                                            <input v-model="editEventData.title" type="text" class="form-control" id="title">
                                            <div class="text-danger">
                                                {{ errors.title }}
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="title">Venue</label>
                                            <input v-model="editEventData.location" type="text" class="form-control" id="location">
                                            <div class="text-danger">
                                                {{ errors.location }}
                                            </div>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="date">Date</label>
                                            <input v-model="editEventData.date" type="date" class="form-control" id="date">
                                            <div class="text-danger">
                                                {{ errors.date }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6 form-group">
                                                <label for="start">Start</label>
                                                <select v-model="editEventData.start" class="form-control" id="start" required>
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
                                                <select v-model="editEventData.end" class="form-control" id="end" required>
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
                                            <textarea v-model="editEventData.description" minlength="10" class="form-control" id="description" rows="8"></textarea>
                                            <div class="text-danger">
                                                {{ errors.description }}
                                            </div>
                                        </div>
                                
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn-bg-save px-4"  v-show="loading">
                                            <i class="bi bi-cloud-download"></i> Update
                                            <span
                                                    v-show="loading"
                                                    class="spinner-border spinner-border-sm"
                                            ></span>
                                        </button>
                                        <button type="submit" class="btn-bg-save px-4"  v-show="!loading">
                                            <i class="bi bi-cloud-download"></i> Update
                                        </button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="modal fade" id="delEvent" tabindex="-1" role="dialog" aria-labelledby="delEvent" aria-hidden="true">
                        <div class="modal-dialog">
                            <form  @submit.prevent="handleSubmitDelete">  
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="delEventLabel"></h5>
                                        <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        <i class="bi bi-exclamation-circle-fill text-danger justify-content-center d-flex"></i>
                                        <div class="col content-modal">
                                            <h4 class="justify-content-center d-flex fw-semibold ">Delete Confirmation</h4>
                                            <p class="justify-content-center d-flex text-black-50 mt-3">Are you sure you want to delete this event?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn  btn-danger px-4"  v-show="loading">
                                            <i class="bi bi-trash"></i> Delete
                                            <span
                                                    v-show="loading"
                                                    class="spinner-border spinner-border-sm"
                                            ></span>
                                        </button>
                                        <button type="submit" class="btn  btn-danger px-4"  v-show="!loading">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
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
        <div  class="fluid-container mt-5 d-flex justify-content-center" v-if="fecthLoading">
            <span class="spinner-border spinner-border-lg"></span>
        </div>      
       <div class="" v-else>      
            <div v-for="event in eventDataDisplay" :key="event.id" class="fluid-container mt-5" >
                <div class="card p-4 shadow">
                    <div class="fluid-container">         
                        <div class="container text-center">
                            <div class="row justify-content-center">
                                
                                <div class="col pt-4 d-flex justify-content-end">
                                    <p>{{ event.date }}, {{ event.time }}</p>
                                </div>
                                <div class="col-auto d-flex justify-content-end">
                                    <button id="action" type="button" class="btn" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots display-6 border-0" ></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="action">
                                        <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editEvent" href="#" @click="setData(event)"><i class="bi bi-pencil-square "></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delEvent" @click="() => {
                                            deleteId = event.id
                                        }"><i class="bi bi-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="pb-5">
                        <h5 class="display-5">{{ event.title }}</h5>
                        <small>Date posted: {{ event.created_at }} </small>
                    </div>
                   
                    <div class="row ">
                        <div class="col-auto img-container d-flex justify-content-center">
                                    <img :src="event.profile_picture" class="profile-img mt-1 shadow" alt="...">
                        </div>
                        <div class="col-md-2 ">
                            
                            <p class="card-title fw-semibold">{{ event.fullname }}</p>
                            <small class="text-center">{{ event.role}}</small></div>
                        </div>
                    <hr>
                    <div class="fluid-container">
                        <div>
                            <p align="justify" >{{ event.description }}</p>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="btn border" @click="redirect(event.id)">
                                <i class="bi bi-file-earmark-plus"></i> View More
                            </button>
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
    </div>
</template>

 
<script setup>
// import store from "../store";
import { useRouter } from "vue-router";
import { ref, computed, watchEffect, watch, onMounted } from "vue";
import { ADD_EVENT_ACTION, DELETE_EVENT, EDIT_EVENT, FETCH_EVENTS} from "../store/store-constants";
import store from '../store';
import Pagination from '../components/Pagination.vue'

const router = useRouter();

const events = ref(computed(() => store.state.events.events))|| [];

const eventDataHolder = ref([]);
const eventDataDisplay =  ref([]);

const errors = ref({
    title: "",
    location: "",
    date: null,
    description: "",
})

const editEventData =  ref({
    id:"",
    title:"",
    date:null,
    location:"",
    start:"1 am",
    end:"2 am",
    description:""
});

const loading = ref(false);
const fecthLoading = ref(false);

let errorMsg = ref("");

let event = ref({ 
    title:"",
    date:null,
    location:"",
    start:"1 am",
    end:"2 am",
    description:""
});

const deleteId =  ref("");

const search =  ref("");
 
const pagination = ref({
        maxVisibleButtons: 10,
        totalPages: 1,
        perPage: 5,
        currentPage: 1,
        totalEvents: 5,
        showPagination: true,
        firstVal: 1,
        secondVal: 5
      })


const user = ref(computed(() => store.state.auth.user))|| {
  fullname:"user"
};

onMounted(()=>{
    console.log("hello her", user.value)

    if(user.value.role=="student" || user.value.role=="teacher"){
      console.log("hello her")
        router.push({
        name: "DashBoard",
      });

    }
})


const getPage = page => {
        pagination.value.currentPage = page

        // pagination.value.totalEvents = 100
        // pagination.value.totalPages = 100 / 5

        console.log("page",{page})

        let val1 = 1
        let val2 = 5

        val2 = val2 * pagination.value.currentPage
        val1 = val2 - 4

        pagination.value.firstVal = val1
        pagination.value.secondVal = val2

        console.log(val1,val2)
        console.log(events.value.slice(val1,val2))
        eventDataDisplay.value=eventDataHolder.value.slice(val1-1,val2)
       
        console.log("events",events.value)

        if (pagination.value.totalEvents < 5) {
          pagination.value.secondVal = pagination.value.totalEvents
        } else if (pagination.value.firstVal + 5 > pagination.value.totalEvents) {
          pagination.value.secondVal = pagination.value.totalEvents
        }
      
}

const setData = data => {
    editEventData.value.id=data.id
    editEventData.value.title=data.title
    editEventData.value.date=data.date
    editEventData.value.description=data.description
    editEventData.value.location=data.location
    let time =data.time.split("-")
    console.log(time)
    editEventData.value.start=time[0]
    editEventData.value.end=time[1]
    errors.value = {
        title: "",
        location: "",
        date: null,
        description: "",
    }
}
 //  


 

const filterItems = (needle, heystack) => {
  let query = needle.toLowerCase();
  return heystack.filter(item => item.title.toLowerCase().indexOf(query) >= 0);
}

watch(search,()=>{
    console.log("search.value",search.value)
    if(search.value.length>0){
        console.log(filterItems(search.value,events.value))
        eventDataHolder.value=filterItems(search.value,events.value)
        pagination.value.currentPage=1

        pagination.value.totalEvents=eventDataHolder.value.length
        pagination.value.totalPages=parseInt(eventDataHolder.value.length/5)
        
        if(eventDataHolder.value.length%5!==0){
            pagination.value.totalPages+=1;
        }
        getPage(1)
    }else{
        eventDataHolder.value=events.value
        eventDataDisplay.value=eventDataHolder.value.slice(0,5)
        
        pagination.value.currentPage=1

        pagination.value.totalEvents=eventDataHolder.value.length
        pagination.value.totalPages=parseInt(eventDataHolder.value.length/5)

        if(eventDataHolder.value.length%5!==0){
            pagination.value.totalPages+=1;
        }
    }
})

const getEvents=()=>{
    fecthLoading.value=true
  store
    .dispatch(`events/${FETCH_EVENTS}`, {})
    .then(data=> {
    fecthLoading.value=false
      // loading.value = false;
      console.log(data);
      eventDataHolder.value=data.events
      eventDataDisplay.value=eventDataHolder.value.slice(0,5)

      pagination.value.totalEvents=eventDataHolder.value.length
      pagination.value.totalPages=parseInt(eventDataHolder.value.length/5)

      if(eventDataHolder.value.length%5!==0){
        pagination.value.totalPages+=1;
      }
      
    })
    .catch((err) => {
    fecthLoading.value=false

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
     
        
      /** set validation later */

        let is_valid=true
        is_valid=true
        
        
        if(event.value.title.length>0 && event.value.title.length<100){
            errors.value.title=""
        }else{
            errors.value.title="Please Enter Title (1-100 characters)"
            is_valid=false
        }

        if(event.value.location.length>0 && event.value.location.length<100){
            errors.value.location=""
        }else{
            errors.value.location ="Please Enter Location (1-100 characters)"
            is_valid=false
        }

        if(event.value.date != null){
            errors.value.date=""
        }else{
            errors.value.date="Please Select Date"
            is_valid=false
        }

        if(event.value.description.length>10 && event.value.description.length<1000){
            errors.value.description=""
        }else{
            errors.value.description="Please Enter Description (10-1000 characters)"
            is_valid=false
        }

     if(is_valid){
        loading.value=true

        store
        .dispatch(`events/${ADD_EVENT_ACTION}`, {
          title:event.value.title,
          location:event.value.location,
          description:event.value.description,
          date:event.value.date,
          time:event.value.start+"-"+event.value.end,
        })
        .then((data) => {
            eventDataHolder.value=events.value
            eventDataDisplay.value=eventDataHolder.value.slice(0,5)
            
            pagination.value.currentPage=1

            pagination.value.totalEvents=eventDataHolder.value.length
            pagination.value.totalPages=parseInt(eventDataHolder.value.length/5)

            if(eventDataHolder.value.length%5!==0){
                pagination.value.totalPages+=1;
            }
            event.value = ref({
                title:"",
                date:null,
                location:"",
                // start:"1 am",
                // end:"2 am",
                description:""
            });

          loading.value = false;
        $('#addEvent').modal('hide')

            console.log("data here ", data.data);
        })
        .catch((err) => {
          console.log("error", err);
          loading.value = false;
          //   errorMsg.value = err.response.data.error;
        });

     }
      
     

      // this.yearValidation = this.year.length < 4 || this.year.length > 4 ? 'The year must at least 4 number only' : ''
     
}

const handleSubmitEdit= ()=>{
     
   
   /** set validation later */

    let is_valid = true
    is_valid = true

    if (editEventData.value.title.length > 0 && editEventData.value.title.length < 100) {
        errors.value.title = ""
    } else {
        errors.value.title = "Please Enter Title (1-100 characters)"
        is_valid = false
    }

    if (editEventData.value.location.length > 0 && editEventData.value.location.length < 100) {
        errors.value.location = ""
    } else {
        errors.value.location = "Please Enter Location (1-100 characters)"
        is_valid = false
    }

    if (editEventData.value.date != null) {
        errors.value.date = ""
        console.log(editEventData.date)
    } else {
        errors.value.date = "Please Select Date"
        console.log(date)
        is_valid = false
    }

    if (editEventData.value.description.length > 10 && editEventData.value.description.length < 1000) {
        errors.value.description = ""
    } else {
        errors.value.description = "Please Enter 2  Description (10-1000 characters)"
        is_valid = false
    }
   
     if(is_valid){
        loading.value=true
        store
        .dispatch(`events/${EDIT_EVENT}`, {
            id: editEventData.value.id,
            data: {
                title: editEventData.value.title,
                location: editEventData.value.location,
                description: editEventData.value.description,
                date: editEventData.value.date,
                time: editEventData.value.start + "-" + editEventData.value.end,
            }
        })
        .then((data) => {

            eventDataHolder.value = events.value
            eventDataDisplay.value = eventDataHolder.value.slice(0, 5)

            pagination.value.currentPage = 1

            pagination.value.totalEvents = eventDataHolder.value.length
            pagination.value.totalPages = parseInt(eventDataHolder.value.length / 5)

            if (eventDataHolder.value.length % 5 !== 0) {
                pagination.value.totalPages += 1;
            }
            editEventData.value = ref({
                title: "",
                date: null,
                location: "",
                start: "1 am",
                end: "2 am",
                description: ""
            });
            
            loading.value=false
             $('#editEvent').modal('hide')
  
            console.log("data here ", data);
        })
        .catch((err) => {
            console.log("error", err);
            loading.value = false;
        });
     }
     

  

   // this.yearValidation = this.year.length < 4 || this.year.length > 4 ? 'The year must at least 4 number only' : ''
  
}

const handleSubmitDelete= ()=>{
     
     console.log(deleteId.value)
   /** set validation later */
   
     errorMsg.value=""
     loading.value=true
          
     store
     .dispatch(`events/${DELETE_EVENT}`, {
        id:deleteId.value,  
     })
     .then((data) => {
            eventDataHolder.value=events.value
            eventDataDisplay.value=eventDataHolder.value.slice(0,5)
            
            pagination.value.currentPage=1

            pagination.value.totalEvents=eventDataHolder.value.length
            pagination.value.totalPages=parseInt(eventDataHolder.value.length/5)

            if(eventDataHolder.value.length%5!==0){
                pagination.value.totalPages+=1;
            }
        deleteId.value = ""

       loading.value = false;
       $('#delEvent').modal('hide')    
     })
     .catch((err) => {
       console.log("error", err);
       loading.value = false;
       
     });

   
  
}

</script>

<style >
 .pagination-label {
    color: #8b9da8;
    /* font: normal normal normal 14px/19px Clear Sans; */
  }
  .btn-bg-add{
    background-color: #2b99be;
    border-radius: 5px;
    color: aliceblue;
    border: none;
    width: fit-content;
    padding: 0px 10px 0px 10px;
  }
  .btn-bg-save{
    background-color: #2b99be;
    border-radius: 5px;
    color: aliceblue;
    border: none;
    width: fit-content;
    padding: 6.5px;
  }
  .bi-exclamation-circle-fill{
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
  .profile{
    height: 100% !important;
    /* position: absolute; */
    width: 100%;
    padding: 10px;
    object-fit: cover;
    /* height: 100px; */
    border-radius: 50%;
  }
.profile-img{
    height: 90% !important;
    /* width: 100%; */
    /* object-fit: cover; */
    border-radius: 50%;
    
  }
.img-container{
    width: 77px;
    height: 77px;
  }
</style>