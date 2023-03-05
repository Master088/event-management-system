<template>
  <div>
    <div class="container  mt-5 banner py-4 mb-5 ">
            <div class="row">
              <div class=" col-md-3  text-center  ">
                <img src="../assets/img/t.png" alt="" class="hello-img img-fluid text-center">
              </div>
              <div class="col-md-9 ">
                  <div class="row">
                    <div class="col-md-8 mt-2">
                      <h1 class="display-4" > Welcome Back <br> <span class="hi">{{user?.fullname}}.</span> </h1>
                      <div class="">
                        <h6 class="py-2 hi-txt">Please check the latest events today!</h6>
                      </div>
                    </div>

                  <div class="col-md-4">
                    <p class="d-flex justify-content-end hi-txt">{{timer_date}}</p>
                    <p class="d-flex justify-content-end hi-txt">{{timer_time}}</p>
                  </div>
                  </div>
 
              </div>
            </div>
         
  </div>

  <div class="container pt-4 ">
    <div class="row d-flex justify-content-around">
      
      <div class="col-4">
        <div :class="active=='joined' ? 'card box3 border-0 shadow'  : 'card box2 border-0'" @click="setActive('joined')">
          <div :class="active=='joined' ? 'card-body boxmain' : 'card-body'"  >
            <div class="row">
              <div class="col">
                <h5 class="text-white up">JOINED EVENT</h5>
                <h5 class="pt-2 text-white number">{{ joined_event.length }}</h5>
              </div>
              <div class="col d-flex justify-content-end">

                <img v-if="active=='joined'" src="../assets/img/calendar.png" alt="" class="update-icn">
                <img v-else src="../assets/img/update.png" alt="" class="update-icn">
              
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 ">
        <div :class="active=='today' ? 'card box3 border-0 shadow'  : 'card box2 border-0'" @click="setActive('today')">
          <div :class="active=='today' ? 'card-body boxmain' : 'card-body'"  >
            <div class="row">
              <div class="col">
                <h5 class="text-white up">TODAY'S EVENT</h5>
                <h5 class="pt-2 text-white number">{{ event_today.length }}</h5>
              </div>
              <div class="col d-flex justify-content-end">
                <img v-if="active=='today'" src="../assets/img/calendar.png" alt="" class="update-icn">
                <img v-else src="../assets/img/update.png" alt="" class="update-icn">
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-4  ">
        <div :class="active=='upcoming' ? 'card box3 border-0 shadow'  : 'card box2 border-0'" @click="setActive('upcoming')">
          <div :class="active=='upcoming' ? 'card-body boxmain' : 'card-body'"  >
            <div class="row">
              <div class="col">
                <h5 class="text-white up">UPCOMING EVENT</h5>
                <h5 class="pt-2 text-white number">{{ upcoming.length }}</h5>
              </div>
              <div class="col d-flex justify-content-end">
                <img v-if="active=='upcoming'" src="../assets/img/calendar.png" alt="" class="update-icn">
                <img v-else src="../assets/img/update.png" alt="" class="update-icn">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container pt-5 ">

    <div class="d-flex justify-content-around" v-if="active == 'joined'" >
      <div class="card mb-3" style="max-width: 25rem;" v-for="event in joined_event" :key="event.id">
        <div class="card-header bg-transparent">
          <div class="row">
            <span><p class="d-flex justify-content-end date-t">Date: <b>{{ event.date }}</b></p></span>
            <span><p class="d-flex justify-content-end date-t ">Time: <b> {{ event.time }}</b></p></span>
          </div>
        </div>
        <div class="card-body">
            <div class="row g-0">
                  <div class="col-sm-3 img-container d-flex justify-content-center">
                    <img :src="event.posted_by_profile" alt="" class="img-fluid profile-img mt-1 ">
                  </div>
                  <div class="col m-2">
                    <h5><b>{{ event.posted_by_fullname }}</b></h5>
                      <p class="name-t">{{ event.posted_by_role }}</p>
                  </div>
              </div>
             <div class="row">
              <div class="col-md-12">
                <h5 class=" py-2 mt-2"><b>{{ event.title }}</b></h5>
              </div>
              <div class="col-md-12">
              <p class=" info"> {{ event?.description.substring(0, 200) }}<span class="btn info"  @click="redirect(event.id)"><b>View More</b></span></p>
              </div>
            </div>
        </div>
      </div>
    </div>

    <!-- <div class="row d-flex justify-content-around"  v-if="active=='joined'">
      <div class="col-4 d-flex" v-for="event in joined_event" :key="event.id"  >
        <div  class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 d-flex justify-content-end ">
                <div class="">
                  <div class=""><p class="date-t">Date: <b>{{ event.date  }}</b></p></div>
                  <div class=""><p class="date-t ">Time: <b> {{ event.time }}</b></p></div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="profile">
                  <img :src="event.posted_by_profile" alt="" class="img-fluid profile-img shadow ">
                </div>
              </div>
              <div class="col-md-7">
                <h5><b>{{ event.posted_by_fullname }}</b></h5>
                <p class="name-t">{{ event.posted_by_role }}</p>
              </div>
              
              
              <h5 class=" py-2 mt-2"><b>{{ event.title }}</b></h5>
              <p class=" info"> {{event?.description.substring(0,200)}}<span class="btn info"  @click="redirect(event.id)"><b>View More</b></span></p>

              
            </div>
          </div>
        </div>
      </div>
    </div> -->
    

    <!-- <div class="row d-flex justify-content-around"  v-else-if="active=='today'">
      <div class="col-4 d-flex" v-for="event in event_today" :key="event.id"  >
        <div  class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 d-flex justify-content-end ">
                <div class="">
                  <div class=""><p class="date-t">Date: <b>{{ event.date  }}</b></p></div>
                  <div class=""><p class="date-t ">Time: <b> {{ event.time }}</b></p></div>
                </div>
              </div>
             
              <div class="col-3">
                <div class="profile">
                 
                  <img :src="event.posted_by_profile" alt="" class="img-fluid profile-img shadow ">
                </div>
              </div>
              <div class="col-7">
                <h5><b>{{ event.posted_by_fullname }}</b></h5>
                <p class="name-t">{{ event.posted_by_role }}</p>
              </div>           
              <h5 class=" py-2 mt-2"><b>{{ event.title }}</b></h5>
              <p class=" info"> {{event?.description.substring(0,200)}}<span class="btn info"  @click="redirect(event.id)"><b>View More</b></span></p>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="d-flex justify-content-around" v-if="active == 'today'" >
        <div class="card mb-3" style="max-width: 25rem;" v-for="event in event_today" :key="event.id">
          <div class="card-header bg-transparent">
            <div class="row">
              <span><p class="d-flex justify-content-end date-t">Date: <b>{{ event.date }}</b></p></span>
              <span><p class="d-flex justify-content-end date-t ">Time: <b> {{ event.time }}</b></p></span>
            </div>
          </div>
          <div class="card-body ">
             <div class="row g-0">
                <div class="col-sm-3 img-container d-flex justify-content-center">
                  <img :src="event.posted_by_profile" alt="" class="img-fluid profile-img mt-1 ">
                </div>
                <div class="col m-2">
                  <h5><b>{{ event.posted_by_fullname }}</b></h5>
                    <p class="name-t">{{ event.posted_by_role }}</p>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <h5 class=" py-2 mt-2"><b>{{ event.title }}</b></h5>
                </div>
                <div class="col-md-12">
                <p class=" info"> {{ event?.description.substring(0, 200) }}<span class="btn info"  @click="redirect(event.id)"><b>View More</b></span></p>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around" v-if="active == 'upcoming'" >
          <div class="card mb-3" style="max-width: 25rem;" v-for="event in upcoming" :key="event.id">
            <div class="card-header bg-transparent">
              <div class="row">
                <span><p class="d-flex justify-content-end date-t">Date: <b>{{ event.date }}</b></p></span>
                <span><p class="d-flex justify-content-end date-t ">Time: <b> {{ event.time }}</b></p></span>
              </div>
            </div>
            <div class="card-body">
               <div class="row g-0">
                  <div class="col-sm-3 img-container d-flex justify-content-center">
                    <img :src="event.posted_by_profile" alt="" class="img-fluid profile-img mt-1 ">
                  </div>
                  <div class="col m-2">
                    <h5><b>{{ event.posted_by_fullname }}</b></h5>
                      <p class="name-t">{{ event.posted_by_role }}</p>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-12">
                    <h5 class=" py-2 mt-2"><b>{{ event.title }}</b></h5>
                  </div>
                  <div class="col-md-12">
                  <p class=" info"> {{ event?.description.substring(0, 200) }}<span class="btn info"  @click="redirect(event.id)"><b>View More</b></span></p>
                  </div>
                </div>
            </div>
          </div>
        </div>

    <!-- <div class="row d-flex justify-content-around"  v-else-if="active=='upcoming'">
      <div class="col-4 d-flex" v-for="event in upcoming" :key="event.id"  >
        <div  class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 d-flex justify-content-end ">
                <div class="">
                  <div class=""><p class="date-t">Date: <b>{{ event.date  }}</b></p></div>
                  <div class=""><p class="date-t ">Time: <b> {{ event.time }}</b></p></div>
                </div>
              </div> 
             <div class="col-3">
                <div class="profile">               
                  <img :src="event.posted_by_profile" alt="" class="img-fluid profile-img shadow ">
                </div>
              </div>
              <div class="col-7">
                <h5><b>{{ event.posted_by_fullname }}</b></h5>
                <p class="name-t">{{ event.posted_by_role }}</p>
              </div>           
              <h5 class=" py-2 mt-2"><b>{{ event.title }}</b></h5>
              <p class=" info"> {{event?.description.substring(0,200)}}<span class="btn info"  @click="redirect(event.id)"><b>View More</b></span></p>
            </div>
          </div>
        </div>
      </div>
    </div> -->

  </div>
  </div>
</template>

<script setup>
// import store from "../store";
import { useRouter } from "vue-router";
import { ref, computed, watchEffect } from "vue";
import { GET_DOCUMENTS , CREATE_FOLDER_ACTION, FETCH_DASHBOARD_EVENTS} from "../store/store-constants";
import store from '../store';

const router = useRouter();

const user = ref(computed(() => store.state.auth.user))|| {};

const upcoming = ref(computed(() => store.state.events.upcoming_events))|| [];
const event_today = ref(computed(() => store.state.events.events_today))|| [];
const joined_event = ref(computed(() => store.state.events.joined))|| [];
 
let displayData =ref( [])


let loading = ref(false);
let errorMsg = ref("");

const active = ref("joined");

const timer_date=ref("")
const timer_time=ref("")


const time=()=> {
  var d = new Date();
  // var s = d.getSeconds();
  // var m = d.getMinutes();
  // var h = d.getHours();
  // timer.value = 
  //   ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
  timer_date.value=d.toDateString();
  timer_time.value=d.toLocaleTimeString();

}

setInterval(time, 1000);

const setActive=(value)=>{
      console.log(value)
      active.value=value;
    displayData.value=[]
      if(value=="joined"){
        displayData.value=joined_event.value;
      }else if(value=="today"){
        displayData.value=event_today.value;
      }else{
        displayData.value=upcoming.value;
      }
      console.log("test",displayData.value)

}

const  getDashboardEvents=()=>{
  console.log("fetch")
  store
    .dispatch(`events/${FETCH_DASHBOARD_EVENTS}`, {})
    .then(data => {
      // loading.value = false;
      console.log("data here1231 ", data);
        displayData.value=joined_event.value
       
    })
    .catch((err) => {
      console.log("error", err);
      // loading.value = false;
      //   errorMsg.value = err.response.data.error;
    });
   
    
}
const redirect=(id)=>{
  router.push(`/event/${id}`)
}
 
    watchEffect(() => getDashboardEvents())

    
</script>

<script>
export default {
  data(){
    return{
      collapsed: false,
    }
  },
  methods:{
    toggleSidebar(){
      this.collapsed = !this.collapsed
    },
  }
}
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: "Poppins", sans-serif;
}
a {
  color: inherit;
}
.banner{
  background-color:#D9E9F6;
  border-radius: 15px;
}

.hello-img{
width: 100%;
height: 100%;
}
 
.hi {
  color: #4176bd;
  font-weight: 600;
}
.hi-txt{
  color: #025498;
}
.title{
  font-size: 18px;
}
.box1{
  background: #2B468A;
  position: relative;
  border-radius: 10px;
  
}
.box2{
  background: #2B468A;
  position: relative;
  border-radius: 10px;
  height: 90px;
  cursor: pointer;
}
.box3{
  background: #d6d6d6;
  position: relative;
  border-radius: 10px;
  height: 90px;
  cursor: pointer;
}
.icon{
 height: 90px;
  width: 8rem;
  position: absolute;
  margin-top: -18px;
  margin-right: -16px;
  
}
.icon1{
  height: 90px;
  width: 8rem;
  position: absolute;
  margin-top: -18px;
  opacity: 0.7;
  margin-right: -16px;
  }

.boxmain{
  background: #FB9847;
  position: relative;
  border-radius: 10px;
  top:-15%;
}
.update-icn{
  height: 88px;
  width: 9rem;
  position: absolute;
  margin-top: -15px;
  margin-right: -16px;
}
.up{
  position: absolute;
  z-index: 1;
  
}
.number{
  margin-top: 25px;
  position:absolute;
}
.img-container{
  width: 80px;
  height: 80px;
  padding: 5px;
  /* margin-right: 30px; */
}
.profile-img{
  border-radius: 50%;
  height: 90% !important;
  /* width: auto; */
}
.date-t{
  font-size: 13px;
}
.name-t, .info, .date{
  font-size: 15px;

}

</style>
