<template>
    <div class="post-info">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-widget">
                    <div class="card-header">
                        <div class="user-block">
                            <img class="img-circle" src="/img/profile.png" alt="User Image">
                            <span class="username"><a href="#">{{post.user.name}}</a></span>
                            <span class="description">Ngày đăng - {{post.user.created_at}}</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                                <i class="fa fa-circle-o"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <img class="img-fluid pad" src="/img/profile.png" alt="Photo">

                        <p>{{post.content}}</p>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i> Share</button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-thumbs-o-up"></i> Like</button>
                        <span class="float-right text-muted">127 likes - 2 comments</span>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer card-comments">
                        <div class="card-comment" v-for="comment in post.comments">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="/img/profile.png" alt="User Image">

                            <div class="comment-text">
                                <span class="username">
                                    {{comment.user.name}}
                                    <span class="text-muted float-right">{{comment.created_at}}</span>
                                </span><!-- /.username -->
                               {{comment.message}}
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.card-comment -->
                    </div>
                    <!-- /.card-footer -->
                    <div class="card-footer">
                        <img class="img-fluid img-circle img-sm" src="/img/profile.png" alt="Alt Text">
                        <div class="img-push">
                            <input type="text" v-model="newComment.message" class="form-control form-control-sm" @keyup.enter="addComment()" placeholder="Press enter to post comment">
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PostInfo",
        created(){
            this.getPostInfo();
        },
        mounted(){

        },
        beforeRouteUpdate(to, from, next) {
            this.postId = to.params.postId;
            next()
        },
        watch: {
          postId: function () {
              this.newComment.post_id = this.postId;
              this.getPostInfo();
          }
        },
        data(){
          return {
              postId: this.$route.params.postId,
              post:{
                  user: {
                      name: "",
                      created_at: null
                  }
              },
              newComment: {
                  post_id: this.$route.params.postId,
                  message: ""
              }
          }
        },
        methods: {
            getPostInfo(){
                axios.get('/api/posts/' + this.postId).then(response => {
                    if (response.status === 200){
                        this.post = response.data;
                    }
                })
            },
            addComment(){
                axios.post('/api/comments',this.newComment)
                    .then(response => {
                    if (response.status === 201){
                        this.getPostInfo();
                        this.newComment.message = "";
                    }
                }).catch(error => {
                        console.log(error.response)
                    });
            }
        }
    }
</script>

<style scoped>
.post-info {
    padding-top: 10px;
}
</style>
