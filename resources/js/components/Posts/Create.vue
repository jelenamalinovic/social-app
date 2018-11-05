
<template>
    <div class="form-style">

        <h2>Create post</h2>

        <div :class="{ 'form-group': true, 'has-error': errors.title}">
            <input type="text" v-model="title" placeholder="Title"/>
            <span v-if="errors.title" class="error-message"> {{ errors.title[0] }} </span>
        </div>

        <div :class="{ 'form-group': true, 'has-error': errors.text}">
            <textarea placeholder="Text" v-model="text" rows="3"></textarea>
            <span v-if="errors.text" class="error-message"> {{ errors.text[0] }} </span>
        </div>

        <div :class="{'has-error': errors.image}">

            <span class="attachment-heading">
                <i class="material-icons">image</i>
                <label class="attachment-label"> Add Image
                <input class="attachment" type="file"
                       id="attachments"
                       @change="uploadFieldChange">
                </label>
            </span>

            <span class="di-block  p-10" v-cloak v-if=" attachments[0]">
                <span class="attachment-name">{{ attachments[0].name + ' (' + Number((attachments[0].size / 1024 / 1024).toFixed(3)) + 'MB)'}}</span>
                <a @click="removeAttachment(attachments[0])"
                   class="close-button"> <i class="material-icons">close</i></a>
            </span>

            <span v-if="errors.image" class="error-message"> {{ errors.image[0] }} </span>
        </div>
        <input @click="create" type="button" value="Create Post"/>

    </div>
</template>


<script>

    import axios from 'axios';
    import {eventBus} from "../../app"

    export default {
      props: {
        user_id: {
          type: Number,
          required: true
        }
      },
      data() {
        return {
          errors: [],
          attachments: [],
          title: '',
          text: '',
          data: {}
        };
      },
      methods: {

          create() {

              this.prepareFields();

              let config = {
                  headers: {
                      'Content-Type': 'multipart/form-data'
                  }
              };

              axios
                  .post("/api/posts", this.data, config)
                  .then(response => {

                      if ((response.status = 201)) {
                          eventBus.$emit('created_post', {'success': true});

                          this.title = '';
                          this.text = '';
                          this.attachments = [];
                      }
                      this.errors = [];
                      console.log('response', response)
                  })
                  .catch(error => {
                      if (!_.isEmpty(error.response)) {
                          if ((error.response.status = 422)) {
                              this.errors = error.response.data.errors;
                          }
                      }
                  });

              this.value = "";
              this.value = "";
          },

          prepareFields() {

              this.data = new FormData();

              this.data.append("title", this.title);
              this.data.append("text", this.text);
              this.data.append("user_id", this.user_id);

              if(this.attachments[0]) {
                  this.data.append("image", this.attachments[0]);
              }
          },

          uploadFieldChange(e) {
              let files = e.target.files || e.dataTransfer.files;
              if (!files.length)
                  return;
              for (let i = files.length - 1; i >= 0; i--) {
                  this.attachments.push(files[i]);
              }

              document.getElementById("attachments").value = [];
          },
          removeAttachment(attachment) {
              this.attachments.splice(this.attachments.indexOf(attachment), 1);
              this.errors.image = [];
          },

      }
    };
</script>

<style scoped>


    .form-style input[type='button'] {
        margin-top: -2em;
    }

    .attachment-name {
        padding: 0 10px;
    }

    .close-button {
        display: inline-block;
        user-select: none;
        border-radius: 0.25rem;
        background:  rgba(0, 0, 0, 0.22);
    }


</style>
