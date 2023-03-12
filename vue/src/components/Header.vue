<template>
  <header class="bg-white shadow">
    <div class="fluid-container p-1">
      <div class="btn-group logout py-3 justify-content-end" role="group">
        <div class="col">
          <img :src="user.profile_picture" class="profile-img mt-1 shadow" alt="...">
        </div>
        <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          {{user?.fullname}}
        </button>
        <div class="dropdown-menu mt-1" aria-labelledby="btnGroupDrop1">
          <a class="dropdown-item text-center" data-bs-toggle="modal" data-bs-target="#changepass">
            Change Password
          </a>
          <a class="dropdown-item text-center" href="#" @click="logout"> Logout</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="changepass" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="changepassLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="">
                <div class="modal-body">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" id="password" class="form-control" aria-describedby="passwordHelpBlock" v-model="password">
                    <div class="text-danger">
                        {{ errors.password }}
                    </div>
                    <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" id="confirm_password" class="form-control" aria-describedby="passwordHelpBlock" v-model="password_confirmation">
                    <div class="text-danger">
                        {{ errors.confirm_password }}
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary "  v-show="loading" >Change Password  
                    <span class="spinner-border spinner-border-sm"></span>
                  </button>
                  <button type="button" class="btn btn-primary"  v-show="!loading"  @click="changePassword">Change Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import store from "../store";
import { useRouter } from "vue-router";
import { computed, ref } from "vue";
import { CHANGE_PASSWORD, LOGOUT_ACTION } from "../store/store-constants";

const router = useRouter();
const user = ref(computed(() => store.state.auth.user))|| {
  fullname:"user"
};

const loading=ref(false)

const password=ref("")
const password_confirmation=ref("")

const errors = ref({
  password: "",
  confirm_password: "",
})
const changePassword=()=>{

  let is_valid = true
  is_valid = true

  var regexPassword = /^.*(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?@."]).*$/;

  if (regexPassword.test(password.value)) {
    errors.value.password = ""
  } else {
    errors.value.password = "Password must be including one uppercase letter, one special character and alphanumeric characters"
    is_valid = false
  }
  if (password_confirmation.value === password.value) {
    errors.value.confirm_password = ""
  } else {
    errors.value.confirm_password = "Invalid Password"
    is_valid = false
  }
  if(is_valid){
    loading.value = true
    store
      .dispatch(`auth/${CHANGE_PASSWORD}`, {
        password: password.value,
        password_confirmation: password_confirmation.value
      })
      .then(() => {
        loading.value = false
        store
          .dispatch(`auth/${LOGOUT_ACTION}`)
          .then(() => {
            router.push({
              name: "Login",
            });
          })
          .catch((err) => {
            console.log("error", err);
          });
        $('#changepass').modal('hide')
      })
      .catch((err) => {
        loading.value = false

        console.log("error", err);
      });
  }
}
function logout(ev) {
  ev.preventDefault();

  store
    .dispatch(`auth/${LOGOUT_ACTION}`)
    .then(() => {
      router.push({
        name: "Login",
      });
    })
    .catch((err) => {
      console.log("error", err);
    });
}
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: "Poppins", sans-serif;
}
.logout {
  float: right;
  transition: .4s ease;
  margin-right: 30px;
}
.icon-size {
  font-size: 1.2rem;
}
header{
  height: 70px;
}
.profile-img{
    height: 30px !important;
    /* width: 100%; */
    /* object-fit: cover; */
    border-radius: 50%;
    
  }
</style>
