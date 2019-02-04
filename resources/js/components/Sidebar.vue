<template>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <router-link to="/create-post" class="nav-link">
                    <i class="nav-icon fa fa-file"></i>
                    <p>
                        Tạo bài viết
                        <span class="right badge badge-danger">New</span>
                    </p>
                </router-link>
            </li>
            <section-component></section-component>
        </ul>
    </nav>
</template>

<script>
    import SectionComponent from "./SectionComponent";
    export default {
        name: "Sidebar",
        components: {SectionComponent}
    }
</script>

<style scoped>

</style>
