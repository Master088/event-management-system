<template>
  <div class="container">
    
      
          <div class="card mb-3 shadow">
           
                <div class="row g-0 card-box">
                    <div class="col-md-6">
                    <img src="../assets/img/undraw_forgot_password_re_hxwm.svg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col">
                    <div class="card-body p-5">
                        <h1 class="card-title fw-semibold">Forgot <br> Your Password?</h1>
                       <form>
                            <div class="mb-3 input-box">
                               
                                <input type="email" class="form-control" id="email" placeholder="Email Address">
                            </div>
                            <button type="submit" class="btn w-100 text-white">Reset Password</button>
                            <div class="form-text">
                                <a href="#">
                                    <p>Back to Login</p>
                                </a>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            
          </div>
          <div class="card mb-3 shadow">
           
                    <div class="row g-0 p-5">
                        
                        <div class="col border rounded shadow">
                        <div class="card-body p-5">
                            
                            <h4 class="card-title fw-semibold">Create new password</h4>
                            <p>Your new password must be different from previous used passwords.</p>
                           <form>
                                <div class="mb-3 input-box">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control mb-2" id="email" >
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control mb-2" id="password" >
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control " id="confirm_password" >
                                </div>
                                <button type="submit" class="btn w-100 text-white mt-2">Reset Password</button>
                                <div class="form-text text-center mt-3">
                                    <a href="#">
                                        <p>← Back to Login</p>
                                    </a>
                                </div>
                            </form>
                        </div>
                        </div>
                        <div class="col d-flex justify-content-center pt-5">
                            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/authentication/illustration.svg" alt="">
                        </div>
                    </div>
            
              </div>
             
    
      
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.card-box{
    padding: 10% 5% 10%;
}
.input-box{
    margin-top: 10%
}
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