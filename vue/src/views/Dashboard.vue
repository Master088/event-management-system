<template>
  <div class="container  pt-3"> 
      <div class="card ">
        <div class="card-body banner">
          <div class="row">
            <div class=" col-2  text-center">
              <img src="../assets/logos/clsu-logo.png" alt="" class="hello-img text-center">
            </div>
            <div class="col-10">
                <dir class="row">
                  <div class="col">
                    <h4 class="hi"> Hi, John Doe E.</h4>
                  </div>
                <div class="col">
                  <p class="d-flex justify-content-end hi-txt">10:10:00</p>
                </div>
                </dir>
                <h6 class="py-2 ps-4 hi-txt">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae ducimus repellendus quis consequatur qui deserunt expedita ut, labore dignissimos fuga!</h6>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="container pt-4  ">
    <div class="row d-flex justify-content-center">
      <div class="col-3 me-3">
        <div class="card box1">
          <div class="card-body boxx">
            <div class="row">
              <div class="col">
                <h5 class="text-white">JOINT EVENT</h5>
                <h5 class="pt-2 text-white">25</h5>
              </div>
              <div class="col d-flex justify-content-end">
                <img src="../assets/img/icon.png" alt="" class="icon">
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="col-4 ">
        <div class="card boxmain">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="text-white">EVENT TODAY</h5>
                <h5 class="pt-2 text-white">25</h5>
              </div>
              <div class="col d-flex justify-content-end">
                <img src="../assets/img/calendar.png" alt="" class="icon1">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 ms-3">
        <div class="card box2">
          <div class="card-body boxx1">
            <div class="row">
              <div class="col">
                <h5 class="text-white up">UPCOMING EVENT</h5>
                <h5 class="pt-2 text-white number">25</h5>
              </div>
              <div class="col d-flex justify-content-end">
                <img src="../assets/img/update.png" alt="" class="update-icn">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container pt-5">
    <div class="row d-flex justify-content-center">
      <div class="col-3 me-3">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <p class="date text-center d-flex justify-content-end">08/08/23</p>
              <div class="col-3">
                <div class="profile">
                  <img src="../assets/img/kuku.jpg" alt="" class="profile-pic">
                </div>
              </div>
              <div class="col">
                <p><b>Max Dela Cruz</b></p>
                <p class="name-t">Teacher</p>
              </div>
              <p class="text-center pt-2"><b>Git Webinar</b></p>
              <p class="text-center info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, libero...</p>
              <div class="pt-4 text-center">
                <button class="btn btn-outline-success px-5"><i class="bi bi-eye"></i> View</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <p class="date-t d-flex justify-content-end"><b>08:30 AM</b></p>
               <!-- <p class="date  d-flex justify-content-end">08/24/23</p> -->
              <div class="col-2">
                <div class="profile">
                  <img src="../assets/img/kuku.jpg" alt="" class="profile-pic">
                </div>
              </div>
              <div class="col">
                <p><b>Max Dela Cruz</b></p>
                <p class="name-t">Teacher</p>
              </div>
              <h2 class=" py-2"><b>Git Webinar</b></h2>
              <p class="text-center info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, libero...</p>
              <div class="pt-4 text-center">
                <button class="btn btn-outline-success px-5"><i class="bi bi-eye"></i> View</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 ms-3">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <p class="date text-center d-flex justify-content-end">08/08/29</p>
              <div class="col-3">
                <div class="profile">
                  <img src="../assets/img/kuku.jpg" alt="" class="profile-pic">
                </div>
              </div>
              <div class="col">
                <p><b>Max Dela Cruz</b></p>
                <p class="name-t">Teacher</p>
              </div>
              <p class="text-center pt-2"><b>Git Webinar</b></p>
              <p class="text-center info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, libero...</p>
              <div class="pt-4 text-center">
                <button class="btn btn-outline-success px-5"><i class="bi bi-eye"></i> View</button>
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

const upcoming = ref(computed(() => store.state.events.upcoming))|| [];
const event_today = ref(computed(() => store.state.events.events_today))|| [];
const joined_event = ref(computed(() => store.state.events.joined))|| [];
 
let loading = ref(false);
let errorMsg = ref("");



const  getDashboardEvents=()=>{
  store
    .dispatch(`events/${FETCH_DASHBOARD_EVENTS}`, {})
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
  width: 3rem;
  border-radius: 50%;
  /* margin-right: 30px; */
}
.date-t{
  font-size: 13px;
}
.name-t, .info, .date{
  font-size: 12px;
}

</style>
