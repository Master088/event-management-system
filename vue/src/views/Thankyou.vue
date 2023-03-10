<template>
  <div class="fluid-container">
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#thanks">
      <i class="bi bi-send-fill"></i> Send Email
    </button> -->

    <!-- Modal Email-->
    <div class="modal fade" id="thanks" tabindex="-1" aria-labelledby="thanks" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="p-1 mt-3 justify-content-center d-flex">
            <img src="../assets/img/undraw_mail_sent_re_0ofv.svg" class="card-img-top" alt="emailSend">
        </div>
          <div class="modal-body ">
            <h3 class="card-title fw-bold justify-content-center d-flex">Thank You For Your Registration</h3>
            <p align="center" class="card-text mt-4 text-black-50 justify-content-center d-flex">We have send you an confirmation email to "yourname@email.com"
            Please confirm your email address thank you so much.</p>
            <a href="#" class="btn btn-primary mt-3 justify-content-center d-flex">Continue</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container justify-content-center d-flex">
      <div class="card text-center" style="max-width: 40vw;">
        <img src="../assets/img/undraw_mail_sent_re_0ofv.svg" class="card-img-top py-4" alt="emailSend">
        <div class="card-body">
          <h5 class="card-title">Event Registration</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id accusamus fuga quia minima expedita doloremque
             esse itaque sunt eligendi dignissimos porro neque, praesentium placeat, ea non illum et veritatis iusto!</p>
        </div>
        <div class="card-footer text-muted">
          <p>Tagumpay Nagaño High School</p>
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
}
img{
    height: 200px;
    width: auto;
}
a{
    background-color: #473DFF;
}
</style>