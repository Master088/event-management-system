<template>
 <div class="login-container">
  <div class="container">
    <form @submit="login">
      <div class="row pt-4">
        <div class="col-lg-4 col-md-10  pt-5 card-base ">
            <div class="logo text-center">
              <img src="../assets/logos/logo3.png" alt="" class="logo-main">
            </div>
                        
            <h2 class="text-center welcome-txt">Welcome! </h2>
                        
                        <div class="form pt-4">
                            <input
                              id="email-address"
                              name="email"
                              type="email"
                              autocomplete="email"
                              v-model="user.email"
                              class="input"
                              placeholder="Username"
                              required=""
                            /><i class="bi bi-envelope-fill  text-center "></i>
                          </div>
                          <div class="form pt-4">
                            <input
                              id="password"
                              name="password"
                              type="password"
                              autocomplete="current-password"
                              v-model="user.password"
                              class="input"
                              placeholder="Password"
                              required=""
                            /><i class="bi bi-lock-fill  text-center"></i>
                            </div>
                            
              <div class="submit-container  py-2 text-center">
               
              <span class="text-center text-danger">{{errorMsg}}</span>
            

                <div class=" d-flex justify-content-end pb-4">
                  <router-link to="/forgot-password" >Fotgot Password</router-link>
                </div>


                <button type="submit" class="btn  btn-primary login-btn">
                  Login

                  <span
                    v-show="loading"
                    class="spinner-border spinner-border-sm"
                  ></span>
                </button>
              </div>
        </div>
      
       
        
      </div>
    </form>
  </div>
 </div>
</template>

<script setup>
import store from "../store";
import { useRouter } from "vue-router";
import { ref } from "vue";
import { LOGIN_ACTION } from "../store/store-constants";

const router = useRouter();

const user = {
  email: "",
  password: "",
};

let loading = ref(false);
let errorMsg = ref("");

function login(ev) {
  console.log("hello", user);
  ev.preventDefault();

  loading.value = true;
  errorMsg.value=""
  store
    .dispatch(`auth/${LOGIN_ACTION}`, user)
    .then(() => {
      loading.value = false;

      //   console.log("data here ", data.data);
      router.push({
        name: "DashBoard",
      });
    })
    .catch((err) => {
      console.log("error", err.data);
      loading.value = false;
        errorMsg.value = "Incorrect Credentials";
    });
}
</script>

<style scoped>
 
.logo-main{
        height: 130px;
        width: 200px;
}
    .input {
 padding-left: 10px;
  border-radius: 10px;
  border: 2px solid #97989e;
  width: 90%;
  height: 3rem;
}
.input {
  text-align: left;
  padding-left: 40px;
  /* outline: none; */
  /* border: none; */
  border: 2px solid #97989e;
  width: 100%;

}

.form {
  position: relative;
}
.form i {
  position: absolute;
  left: 1%;
  border-radius: 100%;
  top: 40%;
  padding: 1px 5px 10px 5px;

  z-index: 1;
}
.bi {
  font-size: 25px;
  color: #bdbec1;
  z-index: 1;
}
.welcome-txt{
  color: #072f5f;

}
.login-btn{
  width: 350px;
  background-color: #1e88e5;
  border: 2px #1e88e5;
  height: 40px;
}
.login-btn:hover{
  background-color: #1976d2;
  border: 2px #1976d2;
}
.card-base{
  margin-left: 50px;
  margin-top:40px;
}
.card {
  box-shadow: 25px 25px 10px -5px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
}
</style>
