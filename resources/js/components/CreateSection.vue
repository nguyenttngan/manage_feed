<template>
    <div class="create-course">
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Tạo thư mục</h3>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Mã khóa học</label>
                                <input class="form-control spinner" name="course_id" v-model="newCourse.course_code" type="text" placeholder="Mã khóa học">
                            </div>
                            <div class="form-group">
                                <label>Tên khóa học</label>
                                <input class="form-control spinner" name="course_name" v-model="newCourse.course_name" type="text" placeholder="Tiêu đề">
                            </div>
                            <div class="form-group">
                                <label>Số tín chỉ</label>
                                <select class="form-control" v-model.number="newCourse.number_of_credits" name="number_of_credits">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Học kì</label>
                                <select class="form-control" v-model="newCourse.semester_id" name="number_of_credits">
                                    <option v-bind:value="item.id" v-for="item in semesters">Học kỳ {{item.semester}} {{item.school_year}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" @click.prevent="createCourse()" class="btn btn-primary">Tạo khóa học</button>
                        </div>
                    </form>
                </div>
                <!-- BEGIN PAGE TITLE-->
                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->
            </div>
            <!-- END CONTENT BODY -->
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateSection"
    }
</script>

<style scoped>

</style>
