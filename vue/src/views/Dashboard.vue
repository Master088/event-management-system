<template>
  <div>
    <div class="container d-flex justify-content-center pt-4 ">
        <div class="card mx-5 py-3">
          <div class="card-body">
            <div class="row">
              <div class=" col-2  text-center">
                <img src="../assets/logos/clsu-logo.png" alt="" class="hello-img text-center">
              </div>
              <div class="col-10">
                  <div class="row">
                    <div class="col-md-8">
                      <h1 > Welcome Back <span class="hi">John Doe E.</span> </h1>
                    </div>
                  <div class="col">
                    <p class="d-flex justify-content-end hi-txt">10:10:00</p>
                  </div>
                  </div>
                 <div class="row">
                  <div class="col-md-8">
                    <h6 class="py-2 hi-txt">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae ducimus repellendus quis consequatur qui deserunt expedita ut, labore dignissimos fuga!</h6>
                  </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
  </div>

  <div class="container pt-4 ">
    <div class="row d-flex justify-content-around">
      
      <div class="col-4">
        <div class="card box2 border-0" @click="setActive('joined')">
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
        <div class="card box2 border-0" @click="setActive('today')">
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
        <div class="card box2 border-0" @click="setActive('upcoming')">
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

    <div class="row d-flex justify-content-around"  v-if="active=='joined'">
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
            

               <!-- <p class="date  d-flex justify-content-end">08/24/23</p> -->
              <div class="col-3">
                <div class="profile">
                  <!-- posted_by_profile -->
                  <img src="../assets/img/kuku.jpg" alt="" class="profile-pic">
                </div>
              </div>
              <div class="col-7">
                <h5><b>{{ event.posted_by_fullname }}</b></h5>
                <p class="name-t">{{ event.posted_by_role }}</p>
              </div>
              
              
              <h5 class=" py-2"><b>{{ event.title }}</b></h5>
              <p class=" info"> {{event?.description.substring(0,200)}}<span class="btn info"  @click="redirect(event.id)"><b>View More</b></span></p>

              
              <!-- <div class="pt-4 text-center d-flex justify-content-end">
                <button class="btn btn-outline-success px-5"  @click="redirect(event.id)"><i class="bi bi-eye"></i> View</button>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div class="row d-flex justify-content-around"  v-else-if="active=='today'">
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
            

               <!-- <p class="date  d-flex justify-content-end">08/24/23</p> -->
              <div class="col-3">
                <div class="profile">
                  <!-- posted_by_profile -->
                  <img src="../assets/img/kuku.jpg" alt="" class="profile-pic">
                </div>
              </div>
              <div class="col-7">
                <h5><b>{{ event.posted_by_fullname }}</b></h5>
                <p class="name-t">{{ event.posted_by_role }}</p>
              </div>
              
              
              <h5 class=" py-2"><b>{{ event.title }}</b></h5>
              <p class=" info"> {{event?.description.substring(0,200)}}<span class="btn info"  @click="redirect(event.id)"><b>View More</b></span></p>
              
              <!-- <div class="pt-4 text-center d-flex justify-content-end">
                <button class="btn btn-outline-success px-5" ><i class="bi bi-eye"></i> View</button>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row d-flex justify-content-around"  v-else-if="active=='upcoming'">
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
            

               <!-- <p class="date  d-flex justify-content-end">08/24/23</p> -->
              <div class="col-3">
                <div class="profile">
                  <!-- posted_by_profile -->
                  <img src="../assets/img/kuku.jpg" alt="" class="profile-pic">
                </div>
              </div>
              <div class="col-7">
                <h5><b>{{ event.posted_by_fullname }}</b></h5>
                <p class="name-t">{{ event.posted_by_role }}</p>
              </div>
              
              
              <h5 class=" py-2"><b>{{ event.title }}</b></h5>
              <p class=" info"> {{event?.description.substring(0,200)}}<span class="btn info"  @click="redirect(event.id)"><b>View More</b></span></p>

              
              <!-- <div class="pt-4 text-center d-flex justify-content-end">
                <button class="btn btn-outline-success px-5"  @click="redirect(event.id)"><i class="bi bi-eye"></i> View</button> -->
              <!-- </div> -->
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
import { GET_DOCUMENTS , CREATE_FOLDER_ACTION, FETCH_DASHBOARD_EVENTS} from "../store/store-constants";
import store from '../store';

const router = useRouter();

const upcoming = ref(computed(() => store.state.events.upcoming_events))|| [];
const event_today = ref(computed(() => store.state.events.events_today))|| [];
const joined_event = ref(computed(() => store.state.events.joined))|| [];
 
let displayData =ref( [])


let loading = ref(false);
let errorMsg = ref("");

const active = ref("joined");

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
  background-color: #F1EDED;
  display: flex;
  justify-self:center;
  align-items: center;
}
.hello-img{
  height: 5rem;
}
.hi {
  color: #FB9847;
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
.profile-pic{
  width: 4.5rem;
  border-radius: 50%;
  /* margin-right: 30px; */
}
.date-t{
  font-size: 13px;
}
.name-t, .info, .date{
  font-size: 15px;

}

</style>
