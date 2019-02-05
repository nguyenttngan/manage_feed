<template>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <router-link to="/create-post" class="nav-link">
                    <i class="nav-icon fa fa-file"></i>
                    <p>
                        Tạo bài viết
                        <span class="right badge badge-danger">New</span>
                    </p>
                </router-link>
            </li>
            <section-component v-for="item in sections" v-bind:key="item.id" v-bind:section="item"></section-component>
        </ul>
    </nav>
</template>

<script>
    import {eventBus} from "../app";
    import SectionComponent from "./SectionComponent";
    export default {
        name: "Sidebar",
        components: {
            'section-component': SectionComponent
        },
        created(){
            eventBus.$on('courseIdChange', (courseId) => {
                console.log("Course id sidebar :" + courseId);
                this.courseId = courseId;
                this.getSectionByCourse();
            })
        },
        watch: {
        },
        mounted(){
            // this.getSectionByCourse()
        },
        data(){
            return {
                courseId: 0,
                sections:[]
            }
        },
        methods: {
            getSectionByCourse(){
                if (this.courseId !== undefined){
                    axios.get('/api/get-sections/' + this.courseId).then(response => {
                        if (response.status === 200){
                            this.sections = response.data;
                        }
                    })
                }
            }
        }
    }
</script>

<style scoped>

</style>
