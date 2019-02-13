<template>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
                {{section.name}}
                <i class="right fa fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item" v-for="item in posts">
                <router-link :to=" path +'/post/'+ item.id" class="nav-link">
                    <div class="title-post">
                        <i class="nav-icon fa fa-question"></i>
                        <p>{{item.title}}</p>
                    </div>
                   <div class="description-post">
                       <span>{{item.description}}</span>
                   </div>
                </router-link>
            </li>
        </ul>
    </li>
</template>

<script>
    import {eventBus} from "../app";
    export default {
        name: "SectionComponent",
        props: {
            section: Object,
        },
        created(){
            eventBus.$on('postCreated',(status) => {
                if (status === "success")
                    this.getPosts();
            })
        },
        mounted(){
            // this.path = this.$route.path;
            this.getPosts();
        },
        data(){
            return {
                path: this.$route.path,
                posts:[],
            }
        },
        methods:{
            getPosts(){
                axios.get('/api/get-posts/'+ this.section.id).then(response => {
                    if (response.status === 200){
                        this.posts = response.data
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
