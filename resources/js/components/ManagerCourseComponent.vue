<template>
    <div class="manager-course">
        <div class="manager-section">
            <div class="row">
                <div class="col-md-8">
                    <p>Thông tin khóa học</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Quản lý thư mục</p>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            v-for="section in sections"
                        >
                            {{section.name}}
                            <span class="badge badge-primary badge-pill">12</span>
                        </li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <input class="form-control" type="text" v-model="newSection.name">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" v-on:click.prevent="addSection()">Thêm thư mục</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p>Thêm sinh viên vào lớp</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input class="form-control" type="text" placeholder="Email">
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" v-on:click.prevent="addStudent()">Thêm</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ManagerClassComponent",
        mounted(){
          this.getSections();
        },
        data(){
            return {
                sections: [],
                courseId: this.$route.params.id,
                newSection: {
                    course_id: this.courseId,
                    name: "",
                },
            }
        },
        methods: {
            getSections(){
                if (this.courseId !== undefined){
                    axios.get('/api/get-sections/' + this.courseId).then(response => {
                        if (response.status === 200){
                            this.sections = response.data;
                        }
                    })
                }
            },
            addSection(){
                this.newSection.course_id = this.$route.params.id;
                if (this.courseId !== undefined){
                    axios.post('/api/sections/', this.newSection).then(response => {
                        if (response.status === 201){
                            console.log("Data section :", response.data);
                            this.sections.push(response.data);
                        }
                    })
                }
            },
            addStudent(){

            }
        }
    }
</script>

<style scoped>

</style>
