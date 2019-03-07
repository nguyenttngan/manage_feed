<template>
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" v-model="keyword">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit" @click="searchCourse()">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchCourse",
        props: [],
        created(){
        },
        data(){
            return {
                keyword: "",
            }
        },
        methods: {
            searchCourse() {
                this.$router.push('/courses/search/' + this.keyword.trim())
                axios.get('/api/courses/search/' + this.keyword.trim())
                    .then(res => {
                        console.log(res)
                    }).catch (error => {
                    });
            }
        }
    }
</script>

<style scoped>

</style>
