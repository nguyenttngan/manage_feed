import VueRouter from 'vue-router'
import Vue from 'vue'
import CreatePost from './components/CreatePost'
import CreateCourse from './components/CreateCourse'
import CourseInfo from './components/CourseInfo'
import PostInfo from './components/PostInfo'
Vue.use(VueRouter);
let routes = [
    {
        path: '/create-course',
        component: CreateCourse,
    },
    {
        path: '/course/:id',
        component: CourseInfo,
        children:[
            {
                path: 'create-post',
                component: CreatePost
            },
            {
                path: 'post/:postId',
                component: PostInfo
            }
        ]
    },
];
export default new VueRouter({
    mode: "history",
    routes: routes
});
