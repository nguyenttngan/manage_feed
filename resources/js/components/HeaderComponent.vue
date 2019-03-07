<template>
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-model="courseName">
                        {{courseName}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <router-link :to="{name: 'course',params:{id: item.id}}" v-for="item in courses" v-bind:key="item.id" v-on:click.native="courseInfo(item)" class="dropdown-item">
                            {{item.course_code}}
                        </router-link>
                        <router-link to="/create-course" class="dropdown-item" v-if="type_user === 'lecturer'">
                            Tạo khóa học
                        </router-link>
                    </div>
                </div>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <router-link :to="{name: 'resources'}" class="nav-link">
                    Tài nguyên
                </router-link>
            </li>
            <router-link :to="{name: 'manager-course'}" class="nav-link">
                Quản lý khóa học
            </router-link>
        </ul>

        <!-- SEARCH FORM -->
        <div>
            <search-course></search-course>
        </div>

        <ul class="navbar-nav ml-auto">
            <li>
                <a class="nav-link" href="/logout">Đăng xuất</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    import SearchCourse from './SearchCourse'
    export default {
        name: "HeaderComponent",
        props: ["current_id", "type_user"],
        watch: {
        },
        mounted(){
            this.getCourses();
        },
        data(){
            return {
                courseName: "Khóa học",
                courseId:0,
                courses: [],
            }
        },
        methods: {
            getCourses(){
                if ( this.type_user === "lecturer"){
                    axios.get('/api/get-courses-lecturer/'+ this.current_id).then(response => {
                        if (response.status === 200){
                            this.courses = response.data;
                            if (this.courses.length > 0 ){
                                this.$router.push({name: 'course', params: {id: this.courses[0].id}});
                                this.courseName = this.courses[0].course_code;
                            }
                        }
                    })
                }else {
                    axios.get('/api/get-courses-student/'+ this.current_id).then(response => {
                        if (response.status === 200){
                            this.courses = response.data;
                            if (this.courses.length > 0 ){
                                this.$router.push({name: 'course', params: {id: this.courses[0].id}});
                                this.courseName = this.courses[0].course_code;
                            }
                        }
                    })
                }
            },
            courseInfo(course){
                this.courseId = course.id;
                this.courseName = course.course_code;
            },
            logout(){
                axios.get('/api/logout').then(response => {
                    if (response.status === 200){
                        alert(response.data);
                        // this.$router.go('/login');
                    }
                })
                    .catch(error => {
                        // localStorage.removeItem('auth_token');
                        // delete axios.defaults.headers.common['Authorization'];
                        // this.$router.go('/login');
                    });
            }
        },
        components: {
            SearchCourse
        },
    }
</script>

<style scoped>

</style>
