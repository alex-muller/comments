<template>
  <div>
    <b-container>
      <b-row>
        <b-col md="4" offset-md="4">
          <div class="comments">
            <div class="header">
              <div class="top">
                <div class="check"></div>
                <div class="inline">
                  <h5>Comments</h5>
                  <p>Why do you like MediaLab?</p>
                </div>

              </div>
              <b-row class="bottom">
                <b-col class="stars">
                  <svg><use xlink:href="/images/symbols.svg#sprite-star"></use></svg>
                  120 Stars
                </b-col>
                <b-col class="comments-num">
                  <svg><use xlink:href="/images/symbols.svg#sprite-comment"></use></svg>
                  43 Comments
                </b-col>
              </b-row>

            </div>
            <div class="comments-body">
              <b-media class="comment" v-for="comment in comments" :key="comment.id">
                <div slot="aside" class="photo" style="background-image: url(/images/1.jpg)" alt="Media Aside" />

                <h6>{{ comment.userName }}</h6><span class="time">{{ comment.time }}</span>
                <p>{{ comment.text }}</p>
              </b-media>
            </div>
            <div class="comment-input">
              <b-input-group>
                <b-form-input placeholder="Add a comment..."></b-form-input>
                <b-input-group-append>
                  <b-btn variant="secondary">Post</b-btn>
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
export default {
  data() {
    return {
      comments: [
        {
          id: 1,
          userName: 'John Doe',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec vestibulum est. Curabitur sed libero ligula. Fusce id accumsan libero. Nunc pretium laoreet cursus. Sed nec sodales orci. Ut enim mauris, consectetur in viverra vel, blandit non enim. ',
          time: '1 hour ago',
        },
        {
          id: 2,
          userName: 'John Doe',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec vestibulum est. Curabitur sed libero ligula. Fusce id accumsan libero. Nunc pretium laoreet cursus. Sed nec sodales orci. Ut enim mauris, consectetur in viverra vel, blandit non enim. ',
          time: '1 hour ago',
        },
        {
          id: 3,
          userName: 'John Doe',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec vestibulum est. Curabitur sed libero ligula. Fusce id accumsan libero. Nunc pretium laoreet cursus. Sed nec sodales orci. Ut enim mauris, consectetur in viverra vel, blandit non enim. ',
          time: '1 hour ago',
        },
        {
          id: 4,
          userName: 'John Doe',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec vestibulum est. Curabitur sed libero ligula. Fusce id accumsan libero. Nunc pretium laoreet cursus. Sed nec sodales orci. Ut enim mauris, consectetur in viverra vel, blandit non enim. ',
          time: '1 hour ago',
        },
        {
          id: 4,
          userName: 'John Doe',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec vestibulum est. Curabitur sed libero ligula. Fusce id accumsan libero. Nunc pretium laoreet cursus. Sed nec sodales orci. Ut enim mauris, consectetur in viverra vel, blandit non enim. ',
          time: '1 hour ago',
        },
        {
          id: 4,
          userName: 'John Doe',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec vestibulum est. Curabitur sed libero ligula. Fusce id accumsan libero. Nunc pretium laoreet cursus. Sed nec sodales orci. Ut enim mauris, consectetur in viverra vel, blandit non enim. ',
          time: '1 hour ago',
        },
        {
          id: 4,
          userName: 'John Doe',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec vestibulum est. Curabitur sed libero ligula. Fusce id accumsan libero. Nunc pretium laoreet cursus. Sed nec sodales orci. Ut enim mauris, consectetur in viverra vel, blandit non enim. ',
          time: '1 hour ago',
        },
        {
          id: 4,
          userName: 'John Doe',
          text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec vestibulum est. Curabitur sed libero ligula. Fusce id accumsan libero. Nunc pretium laoreet cursus. Sed nec sodales orci. Ut enim mauris, consectetur in viverra vel, blandit non enim. ',
          time: '1 hour ago',
        },

      ]
    }
  },
  mounted () {
    let commentsBody = document.querySelector('.comments-body')
    commentsBody.scrollTop = commentsBody.scrollHeight
  }
}
</script>
<style lang="scss">
  body::-webkit-scrollbar {
    width: 1em;
  }
  body {
    background-color: #eee;
  }
  p {
    font-size: 14px;
  }
  .inline {
    display: inline-block;
  }
  .comments{
    background-color: #fff;
    position: relative;
    overflow: hidden;

    .comments-body {
      padding: 10px;
      height: 600px;
      overflow: auto;
      padding-right: 15px;
      box-sizing: content-box;
      width: 100%;

      .comment {
        position: relative;
        margin: 20px 0;
        border-top: 1px solid #eee;
        padding: 10px;
        p {
          color: #888;
          font-size: 12px;
        }
        h6 {
          font-size: 14px;
          display: inline-block;
        }
        span.time {
          color: #888;
          position: absolute;
          right: 10px;
          font-size: 10px;
        }
      }
    }

    .header {
      width: 100%;
      position: absolute;
      z-index: 2;
      .top {
        background-color: rgba(0, 0, 0, 0.7);
        padding: 10px;
        color: #fff;

        h5, p {
          margin-bottom: 0;
        }

        .check {
          width: 50px;
          height: 50px;
          background-color: black;
          border-radius: 50%;
          display: inline-block;
          border: 2px solid white;
          position: relative;
          margin-right: 10px;
          vertical-align: top;
          &::before {
            content: '';
            position: absolute;
            display: block;
            width: 16px;
            height: 14px;
            border: 3px solid white;
            border-top: none;
            border-left: none;
            transform: rotate(45deg);
            top: 14px;
            left: 15px;
          }
        }
      }
      .bottom {
        text-align: center;
        margin: 0 !important;
        box-shadow: 0px 2px 10px -6px rgba(0,0,0,0.75);
        &>div {
          padding: 10px;
          background-color: white;
        }
        .stars {
          color: #6ab5bf;
          fill: #6ab5bf;
          border-right: 1px solid #ddd;
        }
        .comments-num {
          color: #5d5d5d;
          fill: #5d5d5d
        }
      }
      svg {
        width: 25px;
        height: 25px;
      }
    }
    .photo {
      border-radius: 4px;
      width: 60px;
      height: 60px;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    }
  }
</style>
