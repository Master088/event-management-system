<template>
    <div class="container">
        <div class="card mb-3 shadow mt-5">
            <div class="row g-0 p-5">
                <div class="col border rounded shadow">
                    <div class="card-body p-5">
                        <h4 class="card-title fw-semibold">Create new password</h4>
                        <p>Your new password must be different from previous used passwords.</p>
                        <form>
                            <div class="mb-3 input-box">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control mb-2" id="password" >
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control " id="confirm_password" >
                            </div>
                            <button type="submit" class="btn w-100 text-white mt-4">Reset Password</button>
                            <div class="form-text text-center mt-3">
                                <a href="#">
                                    <p>← Back to Login</p>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <img src="../assets/img/Forgot password-pana.svg" alt="">
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
.input-box{
    margin-top: 20%
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