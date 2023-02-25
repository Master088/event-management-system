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
  
  <div class="container  pt-3">
    <div class="row d-flex justify-content-center">
      <div class="col-3 me-3">
        <div class="card">
          <div class="card-body">
            <!-- <p><b>Git Webinar</b></p> -->
            <div class="row">
              <div class="col ">
                 <p class="text-center title"><b>Git Webinar</b></p>
                 <p class="student text-center">Student</p>
                
              </div>
              <div class="col text-center time-date">
                 <p><b>Date/Time:</b></p>
                 <p>21-02-2023</p>
                 <!-- <p>8:00AM-11:00 AM</p> -->
              </div>
                <p class="pt-4 place"><b>Place:</b> Learning Center</p>
                <p class="teacher"><b>Teacher:</b> Mr. Max Dela Cruz</p>
              <div class="button d-flex justify-content-end pt-2">
                <button class="btn btn-outline-success"> <i class="bi bi-eye"></i> View</button>
              </div>
              <div class="profile">
                <img src="../assets/img/kuku.jpg" alt="" class="profile-icn">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col ">
                 <p class="text-center title"><b>Git Webinar</b></p>
                 <p class="student ps-5">Student</p>
              </div>
              <div class="col time-date ps-5">
                 <p><b>Date/Time:</b></p>
                 <p>21-02-23</p>
                 <p>8:00AM-11:00 AM</p>
              </div>
            </div>
            <p class="pt-4 place"><b>Place:</b> Learning Center</p>
                <p class="teacher"><b>Teacher:</b> Mr. Max Dela Cruz</p>
             <div class="button d-flex justify-content-end pt-2">
                <button class="btn btn-outline-success"> <i class="bi bi-eye"></i> View</button>
              </div>
            <div class="profile">
                <img src="../assets/img/kuku.jpg" alt="" class="main-pic">
              </div>
          </div>
        </div>
      </div>
      <div class="col-3 ms-3">
        <div class="card">
          <div class="card-body">
            This is some text within a card body.
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
import { GET_DOCUMENTS , CREATE_FOLDER_ACTION} from "../store/store-constants";
import store from '../store';

const router = useRouter();

const folders = ref(computed(() => store.state.documents.folders))|| [];
const files = ref(computed(() => store.state.documents.files))|| [];



const user = {
  email: "",
  password: "",
};
let loading = ref(false);
let errorMsg = ref("");



const getFolders=()=>{
  console.log("helo")
  store
    .dispatch(`documents/${GET_DOCUMENTS}`, {
      left:1,
      type:"folder",
      limit:3
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

const getFiles=()=>{
  store
    .dispatch(`documents/${GET_DOCUMENTS}`, {
      left:1,
      type:"file",
      // limit:3
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
 
    watchEffect(() => getFolders())
    watchEffect(() => getFiles())

    const redirect=(id)=>{
  console.log("hello123")
  router.push(`/department/folder/${id}`)
}
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
  
}
.icon1{
  height: 90px;
  width: 8rem;
  position: absolute;
  margin-top: -18px;
  opacity: 0.7;
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
}
.up{
  position: absolute;
  z-index: 1;
  
}
.time-date{
  font-size: 14px;
}
.student, .place, .teacher{
   font-size: 14px;
}
.profile{
  position: absolute;
 
}
.profile-icn{
  width: 4rem;
  height: 4rem;
  margin-left: -55px;
  margin-top: 15px;
  border-radius: 50%;
}
.main-pic{
  width: 4rem;
  height: 4rem;
  margin-left: -50px;
  margin-top: -290px;
  border-radius: 50%;
}
.number{
  margin-top: 25px;
  position:absolute;
}
</style>
