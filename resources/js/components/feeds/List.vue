<template>
  <div>
    <div class="form-group">
      <button class="btn btn-xs btn-success pull-left" @click="addFeed()">Add new feed</button>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">Feeds list</div>
      <div class="panel-body">
        <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>URL</th>
            <th width="100"></th>
            <th width="100"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="feed, index in feeds">
              <td>{{ feed.id }}</td>
              <td>{{ feed.title }}</td>
              <td>{{ feed.url }}</td>
              <td>
                <div v-if="readingMode && currentFeed.id == feed.id" class="spinner-border" role="status">
                  <span class="sr-only">Reading...</span>
                </div>
                <button v-else class="btn btn-xs btn-success pull-left" @click="readFeed(feed.id)">Read</button>
              </td>
              <td>
                <button class="btn btn-xs btn-danger pull-right" @click="removeFeed(feed.id)">Remove</button>
              </td>
          </tr>
          <feed-read :items="currentFeed.items"></feed-read>
          <feed-add @loadFeed="loadFeed"></feed-add>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
  import FeedRead from './Read.vue';
  import FeedAdd from './Form.vue';

  export default {
    data: function () {
      return {
        feeds: [],
        currentFeed: {
          id: '',
          items: [],
        },
        readingMode: false
      }
    },
    created() {
      this.loadFeed();
    },
    methods: {
      loadFeed() {
        var app = this;
        axios.get('/api/feeds')
          .then(function (resp) {
            app.feeds = resp.data;
          })
          .catch(function (resp) {
            alert("Could not load feeds");
          });
      },

      async readFeed(id) {
        var app = this;
        app.readingMode = true;
        app.currentFeed.id = id;
        await axios.get(`/api/feeds/${id}/read`)
          .then(function (resp) {
            app.currentFeed.items = resp.data;
            $('#feedModal').modal('show');
          })
          .catch(function (resp) {
            alert("Could not read feed");
          });
        app.readingMode = false;
      },

      addFeed() {
        $('#addFeed').modal('show');
      },

      removeFeed(id) {
        var app = this;
        axios.post(`/api/feeds/${id}/remove`)
          .then(function (resp) {
            for (let i = 0; i < app.feeds.length; i++) {
              if (app.feeds[i].id == id) {
                app.feeds.splice(i, 1);
              }
            }
          })
          .catch(function (resp) {
            alert("Could not remove feed");
          });
      }
    },

    components: {
        FeedRead,
        FeedAdd
    },
  }
</script>
