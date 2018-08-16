<template>
  <div>
    <b-container>
      <b-row>
        <b-col md="4" offset-md="4">
          <div class="comments">
            <!--preloader-->
            <div v-if="!isLoaded" class="cssload-container">
              <div class="cssload-speeding-wheel"></div>
            </div>

            <div class="header">
              <div class="top">
                <div class="check"></div>
                <div class="inline">
                  <h5>Comments</h5>
                  <p>Why do you love Media Lab?</p>
                </div>

              </div>
              <b-row class="bottom">
                <b-col class="stars">
                  <svg><use xlink:href="/images/symbols.svg#sprite-star"></use></svg>
                  120 Stars
                </b-col>
                <b-col class="comments-num">
                  <svg><use xlink:href="/images/symbols.svg#sprite-comment"></use></svg>
                  {{ total }} Comments
                </b-col>
              </b-row>

            </div>
            <div class="comments-body">
              <div v-for="(comment, index) in comments" :key="comment.id">
                <comment :comment="comment" @deleted="deleteComment(index)"></comment>
              </div>
            </div>
            <div class="comment-input">
              <b-input-group>
                <b-form-input v-model="comment" placeholder="Add a comment..."></b-form-input>
                <b-input-group-append>

                  <b-btn @click="postComment" variant="secondary">Post</b-btn>
                </b-input-group-append>
              </b-input-group>
            </div>
          </div>
        </b-col>
      </b-row>
    </b-container>

  </div>
</template>
<script>
import Comment from './Comment'
export default {
  components: { Comment },
  data() {
    return {
      comment: '',
      commentsData: [],
      total: 0,
      page: 0,
      last_page: 1,
      isLoaded: true,
      scroll: false
    }
  },
  computed: {
    comments() {
      return this.commentsData.sort(function (a, b) {
        return a.created_at.date > b.created_at.date ? 1 : -1
      })
    }
  },
  mounted () {
    this.getNextPage()
    let commentsBody = document.querySelector('.comments-body')
    commentsBody.onscroll = () => {
      if (commentsBody.scrollTop === 0) {
        this.getNextPage()
      }
    }
  },
  updated () {
    if(this.scroll) {
      let commentsBody = document.querySelector('.comments-body')
      commentsBody.scrollTop = commentsBody.scrollHeight/this.page
      this.scroll = false
    }
  },
  methods: {
    postComment() {
      if (this.comment) {
        axios.post('comments', {comment: this.comment})
          .then(() => {
            this.getComments(1)
            this.comment = ''
          })
      }
    },
    deleteComment(i){
      this.comments.splice(i, 1)
      this.total--
    },
    getNextPage() {
      if (this.last_page > this.page) {
        this.getComments(this.page + 1)
      }
    },
    getComments(page) {
      if (this.isLoaded) {
        this.isLoaded = false
        return axios.get('/comments', {params: {page: page}}).then(res => {
          this.commentsData = page === 1 ? res.data.data : this.commentsData.concat(res.data.data)
          this.total = res.data.meta.total
          this.last_page = res.data.meta.last_page
          this.page = res.data.meta.current_page
          this.isLoaded = true
          this.scroll = true
        })
      }
    }
  }
}
</script>

