<template>
  <div class="fluid-container">
    <div class="card-box">
        <div class="card text-center mb-3 shadow">
            <div class="p-1 mt-3">
                <img src="../assets/img/undraw_mail_sent_re_0ofv.svg" class="card-img-top" alt="emailSend">
            </div>
            <div class="card-body">
                <h3 class="card-title fw-bold">Thank You For Your Registration</h3>
                <p class="card-text mt-4 text-black-50">We have send you an confirmation email to "yourname@email.com" <br>
                Please confirm your email address thank you so much.</p>
                <a href="#" class="btn btn-primary mt-3">Continue</a>
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
.fluid-container{
    padding: 85px;
    /* background-color: #473DFF; */
}
.card-box{
    display: flex;
    justify-content: center;
}
img{
    height: 200px;
    width: auto;
}
a{
    background-color: #473DFF;
}
</style>