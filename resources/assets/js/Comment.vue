<template>
  <b-media class="comment">
    <!--preloader-->
    <div v-if="!isLoaded" class="cssload-container">
      <div class="cssload-speeding-wheel"></div>
    </div>
    <div
      slot="aside"
      class="photo"
      :style="{backgroundImage: 'url(/images/'+_comment.user.photo+')'}"
      alt="Media Aside"/>
    <h6>{{ _comment.user.name }}</h6><span class="time">{{ _comment.time }}</span>
    <span v-if="comment.is_mine" class="comment-buttons">
       <span @click="post" v-if="isEdit">
        <svg  class="edit"><use xlink:href="/images/symbols.svg#sprite-check"></use></svg>
      </span>
      <span v-else @click="edit" >
        <svg  class="edit"><use xlink:href="/images/symbols.svg#sprite-edit"></use></svg>
      </span>
      <span @click="$refs.modal.show()">
        <svg  class="delete"><use xlink:href="/images/symbols.svg#sprite-delete"></use></svg>
      </span>
    </span>
    <p v-if="!isEdit">{{ comment.text }}</p>
    <input v-if="isEdit" type="text" v-model="_comment.text">
    <!--delete modal-->
    <b-modal
      size="sm"
      header-bg-variant="danger"
      header-text-variant="light"
      ok-variant="danger"
      @ok="deleteComment"
      ref="modal" centered
      title="Delete comment">
      <p class="my-4">Are you sure you want to delete your comment?</p>
    </b-modal>
  </b-media>
</template>
<script>
  export default {
    props: ['comment'],
    data () {
      return {
        isLoaded: true,
        isEdit: false,
        _comment: {}
      }
    },
    created(){
      this._comment = this.comment
    },
    methods: {
      edit(){
        this.isEdit = true
      },
      deleteComment() {
        this.isLoaded = false
        axios.delete('comments/' + this._comment.id)
        .then(() => {
          this.$emit('deleted')
        })
      },
      post(){
        if(this._comment.text){
          this.isLoaded = false
          axios.put('comments/' + this._comment.id, {comment: this._comment.text})
          .then(() => {
            this.isLoaded = true
            this.isEdit = false
          })
        }
      }
    }
  }
</script>

<style lang="scss">
  .comment-buttons {
    span {
      cursor: pointer;
      margin-left: 5px;
      svg {
        width: 12px;
        height: 12px;

        &.edit{
          fill: #4e7a54
        }
        &.delete{
          fill: #7e0023
        }
      }
    }
  }
</style>