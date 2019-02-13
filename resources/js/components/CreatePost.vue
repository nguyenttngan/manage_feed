<template>
    <div class="create-post">
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Tạo bài viết</h3>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kiểu bài viết</label>
                                <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""> Câu hỏi,thắc mắc
                                        <span></span>
                                    </label>
                                    <label class="mt-radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"> Thông báo
                                        <span></span>
                                    </label>
                                    <label class="mt-radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios6" value="option3"> Thăm dò ý kiến
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chọn thư mục</label>
                                <select class="form-control" v-model.number="newPost.section_id">
                                    <option v-bind:value="item.id" v-for="item in sections">{{item.name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control spinner" v-model="newPost.title" type="text" placeholder="Tiêu đề">
                            </div>
                            <div class="form-group">
                                <label>Chủ đề</label>
                                <input class="form-control spinner" v-model="newPost.topic" type="text" placeholder="Chủ đề">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control spinner" v-model="newPost.description" type="text" placeholder="Mô tả">
                            </div>
                            <div class="form-group">
                                <label for="editor1">Nội dung</label>
                                <textarea class="form-control" v-model="newPost.content" id="editor1"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" @click.prevent="createPost()" class="btn btn-primary">Tạo bài viết</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
    </div>
</template>

<script>
    import {eventBus} from "../app";
    export default {
        name: "CreatePost",
        mounted() {
            this.getSections();
        },
        data(){
            return {
                course_id: this.$route.params.id ,
                typePost: "",
                newPost : {
                    section_id: "",
                    title: "",
                    topic: "",
                    description: "",
                    content: ""
                },
                sections:[],
            }
        },
        methods: {
            getSections(){
                axios.get('/api/get-sections/' + this.course_id).then(response => {
                    if (response.status === 200){
                        this.sections = response.data
                    }
                })
            },
            createPost(){
                axios.post('/api/posts',this.newPost).then(response => {
                    if (response.status === 201){
                        window.swal.fire(
                            'Thành công!',
                            'Tạo bài viết thành công!',
                            'success'
                        );
                        eventBus.$emit('postCreated', "success");
                        this.$router.go(-1);
                    }
                })
            },
            resetDataCreate(){
                this.newPost.section_id = "";
                this.newPost.title = "";
                this.newPost.topic = "";
                this.newPost.description = "";
                this.newPost.content = "";
            }
        }
    }
</script>

<style scoped>
.create-post {
    padding-top: 10px;
}
</style>
