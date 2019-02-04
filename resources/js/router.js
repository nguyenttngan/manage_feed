import VueRouter from 'vue-router'
import Vue from 'vue'
import CreatePost from './components/CreatePost'
import CreateCourse from './components/CreateCourse'
import CourseInfo from './components/CourseInfo'
Vue.use(VueRouter);
let routes = [
    {
        path: '/create-post',
        component: CreatePost,
    },
    {
        path: '/create-course',
        component: CreateCourse,
    },
    {
        path: '/course/:id',
        component: CourseInfo,
    },
];
export default new VueRouter({
    mode: "history",
    routes: routes
});
