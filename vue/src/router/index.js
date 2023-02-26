import { createRouter, createWebHistory } from "vue-router";

import Login from "../views/Login.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import AuthenticatedLayout from "../components/AuthenticatedLayout.vue";

import Dashboard from "../views/Dashboard.vue";
import DepartmentFolder from "../views/DepartmentFolder.vue";
import DepartmentFolderContent from "../views/DepartmentFolderContent.vue";
import Event from "../views/Event.vue";
import ViewEvent from "../views/ViewEvent.vue";
import Student from "../views/Student.vue";

import Admin from "../views/Admin.vue"
import Faculty from "../views/Faculty.vue";

import NotFound from "../views/NotFound.vue";

import store from "../store";

const routes = [
  {
    path: "/department",
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
        path: "/faculty",
        name: "Faculty",
        component: Faculty,
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
