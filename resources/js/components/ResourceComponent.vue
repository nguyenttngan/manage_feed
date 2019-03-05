<template>
    <div class="resource">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#course-info">Thông tin khóa học</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#lecturer">Giảng viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#document">Tài liệu</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane container active" id="course-info">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Khóa học : {{courseInfo.course_code}} : {{courseInfo.course_name}}</h3>
                        <p>Học kỳ {{courseInfo.semester.semester}} Năm học : {{courseInfo.semester.school_year}}</p>
                        <p>Số tín chỉ : {{courseInfo.number_of_credits}}</p>

                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="lecturer">
                <p>Giảng viên : {{courseInfo.lecturer.name}}</p>
                <p>SĐT liên hệ: {{courseInfo.lecturer.phone_number}}</p>
            </div>
            <div class="tab-pane container fade" id="document">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload tài liệu</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ResourceComponent",
        mounted(){
          this.getCourseInfo();
        },
        data(){
            return{
                courseInfo: [],
                lecturerInfo: [],
                courseId: this.$route.params.id,
            }
        },
        methods: {
           getCourseInfo(){
               if (this.courseId !== undefined){
                   axios.get('/api/courses/' + this.courseId).then(response => {
                       if (response.status === 200){
                           console.log("Data course infor : " , response.data);
                           this.courseInfo = response.data;
                       }
                   })
               }
           }
    }
    }
</script>

<style scoped>

</style>
