<template>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item" v-if="courseId !== undefined">
                <router-link :to="'/course/'+ courseId +'/create-post'" class="nav-link">
                    <i class="nav-icon fa fa-file"></i>
                    <p>
                        Tạo bài viết
                        <span class="right badge badge-danger">New</span>
                    </p>
                </router-link>
            </li>
            <section-component v-for="item in sections"
                               v-bind:key="item.id"
                               v-bind:section="item"
            >
            </section-component>
        </ul>
    </nav>
</template>

<script>
    import SectionComponent from "./SectionComponent";
    export default {
        name: "Sidebar",
        components: {
            'section-component': SectionComponent
        },
        watch: {
            '$route' (to, from) {
                this.courseId = to.params.id;
                this.getSectionByCourse()
            }
        },
        mounted(){
            this.getSectionByCourse()
        },
        data(){
            return {
                courseId: this.$route.params.id,
                sections:[],
                newSection: {
                    course_id: this.courseId,
                    name: "",
                }
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
            },
            addSection(){
                if (this.courseId !== undefined) {
                    axios.post('/api/create-sections/').then(response => {
                        if (response.status === 200){
                            this.sections.add(response.data);
                        }
                    })
                }
            }
        },
    }
</script>

<style scoped>

</style>
