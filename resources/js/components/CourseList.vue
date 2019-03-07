<template>
    <div class="card-body table-responsive-sm table-spaaak">
        <table class="table" v-for="(course, index) in courses">
            <thead>
            <tr>
                <th>
                    Tên khóa học
                </th>
                <th>
                    code khóa học
                </th>
                <th>
                    Hành động
                </th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{course->course_name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "CourseList",
        props:['courses'],
    }
</script>

