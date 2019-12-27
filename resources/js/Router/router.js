import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import Login from '../components/login/Login'
import Signup from '../components/login/Signup'
import CreateCategory from '../components/category/CreateCategory'
import Forum from '../components/forum/Forum'
import Create from '../components/forum/Create'
import Read from '../components/forum/Read'
import Logout from '../components/login/Logout'

const routes = [
     { path: '/login', component: Login },
     { path: '/signup', component: Signup },
     { path: '/category', component: CreateCategory },
     { path: '/forum', component: Forum , name: 'forum'},
     { path: '/question/:slug', component: Read , name: 'read'},
     { path: '/ask', component: Create , name: 'create'},
     { path: '/logout', component: Logout , name: 'logout'},
]

const router = new VueRouter({
    routes ,// short for `routes: routes`,
    mode: 'history',
    hasbang: false,

})

export default router