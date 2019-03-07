import VueRouter from 'vue-router'
import Vue from 'vue'
import CKEditor from '@ckeditor/ckeditor5-vue'
import CreatePost from './components/CreatePost'
import CreateCourse from './components/CreateCourse'
import CourseInfo from './components/CourseInfo'
import PostInfo from './components/PostInfo'
import Resource from './components/ResourceComponent'
import ManagerCourse from './components/ManagerCourseComponent'

Vue.use(VueRouter);
Vue.use(CKEditor);
let routes = [
    {
        path: '/create-course',
        component: CreateCourse,
        name: 'create-course'
    },
    {
        path: '/course/:id',
        component: CourseInfo,
        name: 'course',
        children:[
            {
                path: 'create-post',
                component: CreatePost,
                name: 'create-post',
            },
            {
                path: 'post/:postId',
                component: PostInfo,
                name:'post-info',
            },
            {
                path: 'resources',
                component: Resource,
                name: 'resources',
            },
            {
                path: 'manager',
                component: ManagerCourse,
                name: 'manager-course',
            }
        ]
    },
];
export default new VueRouter({
    mode: "history",
    routes: routes
});
