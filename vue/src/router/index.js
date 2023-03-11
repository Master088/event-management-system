import { createRouter, createWebHistory } from "vue-router";

import Login from "../views/Login.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import AuthenticatedLayout from "../components/AuthenticatedLayout.vue";

import Dashboard from "../views/Dashboard.vue";
 
import Event from "../views/Event.vue";
import ViewEvent from "../views/ViewEvent.vue";
import Student from "../views/Student.vue";
import Thankyou from "../views/Thankyou.vue";
import Loader from "../components/Loader.vue"
import Loader2 from "../components/Loader2.vue"
import ForgotPassword from "../views/ForgotPassword.vue"
import Resetpassword from "../views/Resetpassword.vue"



import Admin from "../views/Admin.vue"
import Teacher from "../views/Teacher.vue";

import NotFound from "../views/NotFound.vue";

import store from "../store";

const routes = [
  {
    path: "/dashboard",
    redirect: "/dashboard",
    component: AuthenticatedLayout,
    meta: { requiresAuth: true },
    children: [
      {
        path: "/dashboard",
        name: "DashBoard",
        component: Dashboard,
      },
      {
        path: "/event",
        name: "Event",
        component: Event,
      },
      {
        path: "/event/:id",
        name: "ViewEvent",
        component: ViewEvent,
      },
      {
        path: "/student",
        name: "Student",
        component: Student,
      },

      {
        path: "/admin",
        name: "Admin",
        component: Admin,
      },
      {
        path: "/teacher",
        name: "Teacher",
        component: Teacher,
      },
      {
        path: "/thankyou",
        name: "Thankyou",
        component: Thankyou,
      },
      {
        path: "/loader",
        name: "Loader",
        component: Loader,
      },
      {
        path: "/loader2",
        name: "Loader2",
        component: Loader2,
      },
      {
        path: "/ForgotPassword",
        name: "ForgotPassword",
        component: ForgotPassword,
      },
      {
        path: "/Resetpassword",
        name: "Resetpassword",
        component: Resetpassword,
      },
     
    ],
  },

  {
    path: "/auth",
    redirect: "/login",
    name: "Auth",
    component: DefaultLayout,
    meta: { isGuest: true },
    children: [
      {
        path: "/login",
        name: "Login",
        component: Login,
      },
    ],
  },

  {
    // path: "/404",
    path: "/:catchAll(.*)", //lopez: try ko lang
    name: "NotFound",
    component: NotFound,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {

  if (to.meta.requiresAuth && !store.state.auth.token) {
    next({ name: "Login" });
  } else if (store.state.auth.token && to.meta.isGuest) {
    next({ name: "DashBoard" });
  } else {
    next();
  }
});

export default router;
