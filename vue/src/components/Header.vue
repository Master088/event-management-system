<template>
  <header class="bg-white shadow">
    <div class="fluid-container p-1">
      <div class="btn-group logout py-3 justify-content-end" role="group">
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
        <div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="">
                <div class="modal-body">
                  
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" id="password" class="form-control" aria-describedby="passwordHelpBlock">
                    <!-- <div id="passwordHelpBlock" class="form-text">
                      Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                    </div> -->
                    <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" id="confirm_password" class="form-control" aria-describedby="passwordHelpBlock">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Change Password</button>
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
import { LOGOUT_ACTION } from "../store/store-constants";

const router = useRouter();
const user = ref(computed(() => store.state.auth.user))|| {
  fullname:"user"
};

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
  /* border: solid 1px red; */
  transition: .4s ease;
  margin-right: 30px;
}
.icon-size {
  font-size: 1.2rem;
}
header{
  height: 70px;
}
</style>
