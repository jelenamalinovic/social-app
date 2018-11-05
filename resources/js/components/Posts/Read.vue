<template>
    <div id="posts">

        <div class="post-box" v-for="post in posts">
            <div class="content">
                <div class="right-icon"  v-if="user_id != null">
                    <ul class="post-settings">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <button type="button" @click="deletePost(post.id)"
                                        class="dropdown-item float-right btn btn-danger">
                                    Delete
                                </button>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="row header">
                    <div class="avatar">
                        <img :src="'/uploads/avatars/avatar.svg'" alt="" />
                    </div>
                    <div class="name">
                        <h5>{{post.user.name}}</h5>
                        <span class="sub">{{post.created_at}}</span>
                    </div>

                </div>

                <div class="row title">
                    {{post.title}}
                </div>
                <div class="row text">
                    {{post.text.substr(0, text_limit) + '...'}}
                </div>
                <div class="row link">
                    <a :href="`/posts/${post.id}`"> Read More &rarr;</a>
                </div>
                <div class="row thumbnail" v-if="post.image">
                    <img :src="`uploads/posts/${post.image}`" alt="" />
                </div>
            </div>
            <div class="footer" v-if="post.comments && post.comments.length">
                <div class="row" v-for="(comment, index) in post.comments" v-if="index < first_n_comments">
                    <div class="small-avatar">
                        <img :src="'/uploads/avatars/avatar.svg'" alt="" />
                    </div>
                    <div class="read-comments">
                        <span class="commentator"> {{comment.user.name}} </span>
                        {{comment.text.substr(0, comment_limit) + '...'}}
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>


<script>
    import axios from 'axios'
    import {eventBus} from "../../app"

    export default {
        name: 'read',
        props: {
            user_id: {
                required: true
            }
        },
      mounted() {
          this.requestResource();
      },
      created() {

            eventBus.$on('created_post', message => {
                if(message.success) {
                    this.requestResource();
                }
            })
      },
      data() {
        return {
          text_limit: 250,
          comment_limit: 50,
          first_n_comments: 3,
          posts: {}
        };
      },
      methods: {
          requestResource() {

              let route = (this.user_id != null) ? `/api/posts-by-user/${this.user_id}` : "/api/posts";

              axios.get(route).then(response => {

                  this.posts = {};
                  for (let attr in response.data.data) {
                      if (response.data.data.hasOwnProperty(attr)) {
                          this.posts[attr] = response.data.data[attr];
                      }

                  }
                  console.log('requestResource posts', this.posts)

              });
          },
        deletePost(id) {
          axios.delete("/api/posts/" + id).then(response => {
            this.requestResource();
          });
        },
      }
    };
</script>

<style scoped>



    img { width: 100%; }

    .post-box {
        width: 53vw;
        margin: 30px auto;
        background: #fff;
        border: 1px solid;
        border-color: #e5e6e9 #dfe0e4 #d0d1d5;
        border-radius: 3px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0 0 15px rgba(0, 0, 0, 0.22);
    }

    .post-box .right-icon {
        float: right;
        display: inline;
        width: 24px;
        height: 24px;
        color: #eee;
        cursor: pointer;
    }

    .post-box .content {
        padding: 2em;
    }

    .post-box .title,
    .post-box .text,
    .post-box .link {
        padding-top: 12px;
    }

    .post-box .title {
        font-size: large;
    }

    .post-box .header .avatar {
        float: left;
        width: 40px;
        height: 40px;
        margin-right: 8px;
    }

    .post-box .header .name {
        width: calc(100% - 40px - 8px);
    }

    .post-box .header .name h5 {
        margin-bottom: 2px;
        font-weight: 700;
        font-size: 14px;
    }

    .post-box .header .name span {
        color: #9197a3;
        font-size: 12px;
    }

    .post-box .header .settings {
       float: right;

    }

    .post-box .thumbnail {
        margin-top: 10px;
        margin-left: -1px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        height: 30em;

    }

    .post-box .footer {
        border-top: 1px solid #e1e2e3;
        margin: 0;
        padding: 9px 12px 7px 40px;
        font-size: 12px;
        background-color: #f6f7f8;
        border-radius: 0 0 3px 3px;
        color: #141823;
        overflow: hidden;
    }

    .post-box .footer .row {
        margin-top: 10px;
        margin-bottom: 2px;
        overflow: hidden;
    }

    .post-box .footer .small-avatar {
        width: 32px;
        height: 32px;
        float: left;
        margin-right: 8px;
    }


    .post-box .post-settings {
        list-style: none;
        margin-left: -3em;
        margin-top: -1em;

    }

    .read-comments{
        padding-top: 7px;
    }

    .commentator{
        font-weight: bold;
    }

</style>
