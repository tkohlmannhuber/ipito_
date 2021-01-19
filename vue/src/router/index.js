import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from "../views/Home.vue";
import Moon from "../views/Moon.vue";
import Login from "../views/Login.vue";
import Signin from "../views/Signin.vue";
import Spot from "../views/Spot.vue";
import NotFound from "../views/NotFound.vue";
import SinglePost from "../views/SinglePost.vue";
import AdminDashboard from "../views/AdminDashboard.vue";
import UserDashboard from "../views/UserDashboard.vue";

Vue.use(VueRouter)

const routes = [
  {
    path: "*",
    name: "404",
    component: NotFound,
  },

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
    path: "/spot/:title",
    name: "Spot",
    component: Spot,
    props: true,
  },

  {
    path: "/login",
    name: "Login",
    component: Login,
  },
  {
    path: "/signin",
    name: "Signin",
    component: Signin,
  },

  {
    path: "/admin/:id",
    name: "Admin",
    component: AdminDashboard,
  },
  {
    path: "/account/:id",
    name: "Account",
    component: UserDashboard,
  },
  {
    path: "/post/:id",
    name: "SinglePost",
    component: SinglePost,
  },


];
const router = new VueRouter({
  routes
})

export default router
