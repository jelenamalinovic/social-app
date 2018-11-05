
<template>

    <div>
        <div class="form-style">

            <h2>Leave a Comment:</h2>

            <div :class="{ 'form-group': true, 'has-error': errors.text}">
                <textarea placeholder="" v-model="text" rows="3"></textarea>
                <span v-if="errors.text" class="error-message"> {{ errors.text[0] }} </span>
            </div>

            <input @click.prevent="addComment" type="button" value="Submit"/>
        </div>

        <div class="comment-box" v-for="comment in comments">
            <div class="content">
               
                <div class="row header">
                    <img :src="'/uploads/avatars/avatar.svg'"  class="avatar" alt="" />
                    <div>
                        <h5>{{comment.user.name}}</h5>
                        <span>{{niceDateFormat(comment.created_at)}}</span>
                    </div>
                </div>

                <div class="row text">
                    {{comment.text}}
                </div>
            </div>
         
        </div>

    </div>

</template>


<script>

    import axios from 'axios';

    export default {
      name: 'comments',
      props: {
        user_name: {
          type: String,
          required: true
        },
        post_id: {
          type: Number,
          required: true
        }
      },
      data() {
        return {
          comments: [],
          text: '',
            errors: [],
        };
      },
      created() {

        this.fetchComments();

        Echo.private("comment").listen("CommentSent", e => {
            this.comments.push({
              user: {
                name: e.user.name
              },
              text: e.comment.text
            });
        });
      },
      methods: {
        fetchComments() {

          axios.get("/" + this.post_id + "/comments").then(response => {
            this.comments = response.data;
          });
        },
        addComment() {

          let text = this.text;
          axios.post("/" + this.post_id + "/comments", { text })
              .then(response => {

                  if(response.data.success) {
                      this.comments.push(response.data.data.comment);
                      this.text = "";
                  }
                  this.errors = [];

              }).catch(error => {
                  if (!_.isEmpty(error.response)) {
                      if ((error.response.status = 422)) {
                          this.errors = error.response.data.errors;
                      }
                  }
              });
        },
        niceDateFormat(date) {

            let options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            date = new Date(date);

            return date.toLocaleDateString("en-US", options);
        }
      }
    };
</script>

<style scoped>

    .form-style {
        padding: 30px 30px 53px 30px;
        margin-bottom: 20px;
    }

    .comment-box {
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

    .comment-box .content {
        padding: 2em;
    }

    .comment-box .text {
        padding-top: 12px;
    }

    .comment-box .header .avatar {
        float: left;
        width: 50px;
        height: 50px;
        margin-right: 8px;
    }

</style>
