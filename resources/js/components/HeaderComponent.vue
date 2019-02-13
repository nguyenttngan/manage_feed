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
                        <router-link v-bind:to="{path: '/course/'+ item.id}" v-for="item in courses" v-bind:key="item.id" v-on:click.native="courseInfo(item)" class="dropdown-item">
                            {{item.course_code}}
                        </router-link>
                        <router-link to="/create-course" class="dropdown-item">
                            Tạo khóa học
                        </router-link>
                    </div>
                </div>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>
</template>

<script>
    import {eventBus} from "../app";
    export default {
        name: "HeaderComponent",
        props: ["current_id"],
        watch: {
          courseId: function (val) {
              if (val !== undefined){
                  console.log("course id :" + val);
                  eventBus.$emit('courseIdChange', val)
              }
          }
        },
        mounted(){
            this.getCourses(this.current_id);
            eventBus.$emit('currentId', this.current_id);
        },
        data(){
            return {
                courseName: "Khóa học",
                courseId:0,
                courses: []
            }
        },
        methods: {
            getCourses(studentID){
                axios.get('/api/courses/'+ studentID).then(response => {
                    if (response.status === 200){
                        this.courses = response.data
                    }
                })
            },
            courseInfo(course){
                this.courseId = course.id;
                this.courseName = course.course_code;
            }
        }
    }
</script>

<style scoped>

</style>
