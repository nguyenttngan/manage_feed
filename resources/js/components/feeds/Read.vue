<template>
  <div class="modal fade" id="feedModal" tabindex="-1" role="dialog" aria-labelledby="userModalDetailTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Feed content</h4>
          <button ref="closeFeedModal" class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th>Link</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item, index in items">
                  <td>{{ item.title }}</td>
                  <td><a :href="item.link" target="#blank">{{item.link}}</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['items'],
  }
</script>
