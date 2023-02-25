<template>
  <div class="wrapper">
      <div class="sidebar shadow">
        <div class="logo-container" align="center">
          <img class="img-logo" src="../assets/logos/sidebar_logo.png" alt="logo">
          <p class="text-black mt-1">Event Management <br> System </p>
        </div>
        <div class="underline px-1">
          <hr />
        </div>
          <ul>
            <li class="nav-bar">             
              <router-link to="/dashboard" ><i class="bi bi-house"></i> <span class="px-4">Dashboard</span></router-link>
            </li>
            <router-link to="/event" ><li class="nav-bar"><a href="#"><i class="bi bi-calendar-week"></i> <span class="px-4">Event</span></a></li></router-link>
            <li class="nav-bar"><a href="#"><i class="bi bi-person"></i> <span class="px-4">Account</span></a></li>
            <li class="nav-bar"><a href="#"><i class="bi bi-building"></i> <span class="px-4">Faculty</span></a></li>
            <li class="nav-bar"><a href="#"><i class="bi bi-people"></i> <span class="px-4">Student</span></a></li>
          </ul>
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
*{
margin: 0;
padding: 0;
box-sizing: border-box;
list-style: none;
text-decoration: none;
font-family: 'Poppins', sans-serif;
}
.img-logo{
height: 90px;
width: auto;
}
.underline{
margin-top: 10px;
color: #3c3c3c;
}
.wrapper{
display: flex;
position: relative;
}

.wrapper .sidebar{
width: 200px;
height: 100%;
background: #ffffff;
padding: 30px 0px;
position: relative;

}
.wrapper .sidebar ul{
margin-top: 100px;
padding: 5px;

}
.wrapper .sidebar ul .nav-bar{
padding: 10px;
border-radius: 5px;
transition: all .5s ease;
}    

.wrapper .sidebar ul .nav-bar a{
color: #303030;
display: block;

}
.wrapper .sidebar ul .nav-bar:hover{
background-color: #16796F;

}
a{
color: inherit;
}
.wrapper .sidebar ul .nav-bar:hover a{
color: #fff;
}
</style>
