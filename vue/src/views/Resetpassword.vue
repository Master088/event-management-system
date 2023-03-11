<template>
    <div class="container">
        <div class="card mb-3 shadow mt-5">
            <div class="row g-0 p-5">
                <div class="col border rounded shadow">
                    <div class="card-body p-5">
                        <h3 class="card-title fw-semibold">Forgot Password?</h3>
                        <br>
                        <p>Hi. <b>JUAN</b></p>
                        <p>A request to reset password was received from Tagumpay Nagaño Admin with your <b>juan@email.com</b> account</p>
                        <br>
                        <p>You can reset your password by clicking the button below:</p>
                        <div class="reset-btn">
                            <a href="#"> <h3 >Reset Password</h3></a> 
                        </div>
                       
                        <p>if you did not initiate this request, please ignore this email. No changes have been made to your account yet.</p>
                        <br>
                        <p>Thanks,<br><b>Tagumpay Nagaño Admin</b></p>
                       
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
.reset-btn{
   color: #1b73c0;
}
</style>