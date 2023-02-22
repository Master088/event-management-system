<template>
  <div class="background">
    <div class="">
      <router-view></router-view>
    </div>
  </div>
</template>
<script>


export default {
  components: {
  
  },
}
</script>
<style scoped>

.background {
        background-image: url('../assets/img/bg.svg');
        background-color: #cccccc;
        background-repeat: no-repeat;
        background-size: cover;
        min-height:100vh;
        font-family: Arial, Helvetica, sans-serif;
        object-fit: cover;
      }
</style>