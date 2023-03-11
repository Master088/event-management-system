<template>
    <div >
        <div >
            <div class="row  form">
                <div v-show="showForgot" class="col-md-5  col-lg-4 p-5 ">
                    <div class="p-2 mt-5">
                        <h4 class="card-title fw-semibold">Forgot Password</h4>
                        <p class="mb-4">Please enter your associated with your account.</p>
                        <form>
                            <div class="mb-3 input-box ">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control mb-2" id="email" v-model="email">
                                
                            </div>
                            <button type="button" class="btn w-100 text-white mt-4"  v-show="loading" >Send Reset Password  
                                <span class="spinner-border spinner-border-sm"></span>
                            </button>
                            <button type="button" class="btn w-100 text-white mt-4"  v-show="!loading"  @click="forgotPassword">Send Reset Password</button>
                           
                            <div class="form-text text-center mt-3">
                                
                                    <router-link to="/login" >← Back to Login</router-link>
                              
                            </div>
                        </form>
                    </div>
                </div>

                <div v-show="!showForgot" class="col-md-5  col-lg-4 p-5 ">
                    <div class="p-2 mt-5">
                        <h4 class="card-title fw-semibold">Reset Password Password</h4>
                        <p class="mb-4">Your new password must be different from previous used passwords</p>
                        <form>
                            <p>{{ msg }}</p>
                            <div class="mb-3 input-box ">
                                <label for="token" class="form-label">Token</label>
                                <input type="text" class="form-control mb-2" id="password" v-model="token">
                            </div>
                            <div class="mb-3 input-box ">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control mb-2" id="password" v-model="password">
                            </div>
                            <div class="mb-3 input-box ">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control mb-2" id="password_confirm"  v-model="password_confirmation">
                            </div>
                            <button type="button" class="btn w-100 text-white mt-4"  v-show="loading" >Reset Password  
                                <span class="spinner-border spinner-border-sm"></span>
                            </button>
                            <button type="button" class="btn w-100 text-white mt-4"  v-show="!loading"  @click="resetPassword">Reset Password</button>
                            <div class="form-text text-center mt-3">
                               
                                    <router-link to="/login" >← Back to Login</router-link>
                                
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-7">
                    <img src="../assets/img/Forgot password-pana.svg" alt="">
                </div>
            </div>
        </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { SEND_FORGOT_PASSWORD, SEND_RESET_PASSWORD } from "../store/store-constants";
import store from "../store";

const email=ref("")

const token=ref("")
const password=ref("")
const password_confirmation=ref("")

 
 const showForgot=ref(true)



const loading = ref(false);
const errorMsg = ref("");

const msg = ref("");


function forgotPassword() {
   
  if(email.value){
    loading.value = true;
 
  store
    .dispatch(`auth/${SEND_FORGOT_PASSWORD}`, {
        email:email.value,
      
    })
    .then((data) => {
        console.log(data)
        loading.value = false;
        showForgot.value=false
    })
    .catch((err) => {
    
      loading.value = false;
        errorMsg.value = "Incorrect Credentials";
    });
  }
}


function resetPassword() {
    msg.value=""
   loading.value = true;
   errorMsg.value=""
   store
     .dispatch(`auth/${SEND_RESET_PASSWORD}`, {
         email:email.value,
         token:token.value,
        password:password.value,
        password_confirmation:password_confirmation.value
     })
     .then((data) => {
         console.log(data)
         loading.value = false;
         msg.value="Your password has been reset. Please re login your account"
     })
     .catch((err) => {
     
       loading.value = false;
         errorMsg.value = "Incorrect Credentials";
     });
 }


</script>

<style scoped>

 
 
a{
    color: inherit;
    text-decoration: none;
}
.btn{
    background-color: #1E88E5;
}
.btn:hover{
    background-color: #1b73c0;
}
</style>