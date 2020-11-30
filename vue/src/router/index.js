import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from "../views/Home.vue";
import Moon from "../views/Moon.vue";
import Login from "../views/Login.vue";
import Spot from "../views/Spot.vue";
import AdminDashboard from "../views/AdminDashboard.vue";

Vue.use(VueRouter)

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/moon",
    name: "Moon",
    component: Moon,
  },
  {
    path: "/moon/:id",
    name: "MoonDetail",
    component: Moon,
  },

  {
    path: "/spot/:id",
    name: "Spot",
    component: Spot,
  },

  {
    path: "/login",
    name: "Login",
    component: Login,
  },

  {
    path: "/admin",
    name: "Admin",
    component: AdminDashboard,
  },


];
const router = new VueRouter({
  routes
})

export default router
