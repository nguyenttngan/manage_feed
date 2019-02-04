<template>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Tạo bài viết
                <small></small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <form role="form">
                <div class="form-body">
                    <div class="form-group">
                        <label>Kiểu bài viết</label>
                        <div class="mt-radio-inline">
                            <label class="mt-radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""> Câu hỏi,thắc mắc
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"> Bài viết thông thường
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
                        <input class="form-control spinner" type="text" placeholder="Tiêu đề">
                    </div>
                    <div class="form-group">
                        <label>Chủ đề</label>
                        <input class="form-control spinner" type="text" placeholder="Chủ đề">
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <label for="editor1"></label><textarea class="form-control" id="editor1"></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn blue">Tạo bài viết</button>
                </div>
            </form>
        </div>
        <!-- END CONTENT BODY -->
    </div>
</template>

<script>
    export default {
        name: "CreatePost",
        props: ['course_id'],
        mounted() {
            this.getSections();
        },
        data(){
            return {
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
                axios.get('api/get-sections/2').then(response => {
                    if (response.status === 200){
                        this.sections = response.data
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
