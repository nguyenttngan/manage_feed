<template>
  <div class="modal fade" id="addFeed" tabindex="-1" role="dialog" aria-labelledby="userModalDetailTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new feed</h4>
          <button ref="closeFeedModal" class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">Title</label>
                <input maxlength="30" class="form-control" type="text" placeholder="Title feed" v-model="title">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">URL</label>
                <input class="form-control" type="text" placeholder="URL feed" v-model="url">
              </div>
            </div>
          </div>

          <button class="btn btn-primary active" type="button" :disabled="!(title && url)" @click="save()">Save</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      title: '',
      url: ''
    }
  },
  methods: {
    save() {
      var app = this;
      axios.post('/api/feeds/create', {
        title: app.title,
        url: app.url
      })
        .then(function (resp) {
          app.$emit('loadFeed');
        })
        .catch(function (resp) {
          alert("Could not add feed");
        });
      app.title = '';
      app.url = '';
      $('#addFeed').modal('hide');
    }
  }
}
</script>
