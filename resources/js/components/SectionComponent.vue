<template>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
                {{section.name}}
                <i class="right fa fa-angle-left"></i>
            </p>
        </a>
        <!--<ul class="nav nav-treeview">-->
            <!--<li class="nav-item" v-for="item in posts">-->
                <!--<router-link to="" class="nav-link">-->
                    <!--<i class="fa fa-circle-o nav-icon"></i>-->
                    <!--<p>{{item.title}}</p>-->
                <!--</router-link>-->
            <!--</li>-->
        <!--</ul>-->
    </li>
</template>

<script>
    export default {
        name: "SectionComponent",
        props: ['section'],
        mounted(){
          // this.getPosts();
        },
        data(){
            return {
                posts:[],
            }
        },
        methods:{
            getPosts(){
                axios.get('/api/posts/'+ this.section.id).then(response => {
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
