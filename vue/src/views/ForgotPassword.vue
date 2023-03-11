<template>
    <div class="container">
        <div >
            <div class="row  form">
                <div v-show="showForgot" class="col-md-5  col-lg-4 p-5 ">
                    <div class="p-2 mt-5">
                        <h4 class="card-title fw-semibold">Forgot Password</h4>
                        <p class="mb-4">Please enter your associated with your account.</p>
                        <p>{{ msg }}</p>
                        <form>
                            <div class="mb-3 input-box ">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control mb-2" id="email" v-model="email">
                                <div class="text-danger">
                                    {{ errors.email }}
                                </div>
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
                            
                            <div class="mb-3 input-box ">
                                <label for="token" class="form-label">Token</label>
                                <input type="text" class="form-control mb-2" id="password" v-model="token">
                                <div class="text-danger">
                                    {{ errors.token }}
                                </div>
                            </div>
                            <div class="mb-3 input-box ">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control mb-2" id="password" v-model="password">
                                <div class="text-danger">
                                    {{ errors.password }}
                                </div>
                            </div>
                            <div class="mb-3 input-box ">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control mb-2" id="password_confirm"  v-model="password_confirmation">
                                <div class="text-danger">
                                    {{ errors.confirm_password }}
                                </div>
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

const errors = ref({
    email: "",
    token: "",
    password: "",
    confirm_password: "",
})
function forgotPassword() {

    let is_valid = true
    is_valid = true
   
    var regexEmail = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;

    if (regexEmail.test(email.value)) {
        errors.value.email = ""
    } else {
        errors.value.email = "Please Enter Valid Email"
        is_valid = false
    }
    

    if (is_valid) {
        if (email.value) {
            loading.value = true;

            store
            .dispatch(`auth/${SEND_FORGOT_PASSWORD}`, {
                email: email.value,

            })
            .then((data) => {
                console.log(data)
                loading.value = false;
                showForgot.value = false
            })
            .catch((err) => {
                loading.value = false;
                errorMsg.value = "Incorrect Credentials";
            });
        }
    }
  
}


function resetPassword() {
    

    let is_valid = true
    is_valid = true

    var regexPassword = /^.*(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?@."]).*$/;

    if (token.value != "") {
        errors.value.token = ""
    } else {
        errors.value.token = "Please Input your Token"
        is_valid = false
    }
   if (regexPassword.test(password.value)) {
        errors.value.password = ""
    } else {
        errors.value.password = "password must be including one uppercase letter, one special character and alphanumeric characters"
        is_valid = false
    }
    if (password_confirmation.value === password.value) {
        errors.value.confirm_password = ""
    } else {
        errors.value.confirm_password = "Invalid Password"
        is_valid = false
    }

   if(is_valid){
    msg.value = ""
    loading.value = true;
    errorMsg.value = ""
    
    store
    .dispatch(`auth/${SEND_RESET_PASSWORD}`, {
        email: email.value,
        token: token.value,
        password: password.value,
        password_confirmation: password_confirmation.value
    })
    .then((data) => {
        console.log(data)
        loading.value = false;
        msg.value = "Your password has been reset. Please re login your account"
        token.value=""
        password.value=""
        password_confirmation.value=""
        email.value=""
        showForgot.value = true
    })
    .catch((err) => {

        loading.value = false;
        errorMsg.value = "Incorrect Credentials";
    });
   }
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