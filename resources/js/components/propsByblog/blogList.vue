<template>
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-3" v-for="item in get_blog_lists" :key="item.id">
        <div @click="fetch_blog_details(item)" style="cursor: pointer" class="card-body">
          <h5>{{ item.title }}</h5>
          <p>
            {{ item.description }}
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <blog-details></blog-details>
    </div>
  </div>
</template>

<script>
import BlogDetails from "./blogDetails.vue";
import { mapGetters, mapActions } from 'vuex';

export default {
  components: {
    BlogDetails,
  },
  data: function () {
    return {
      // blog_lists: [
      //   {
      //     id: 1,
      //     title: "this is Blog 1",
      //     description:
      //       "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet modinon ration",
      //   },
      //   {
      //     id: 2,
      //     title: "this is Blog 2",
      //     description:
      //       "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet modinon ration",
      //   },
      //   {
      //     id: 3,
      //     title: "this is Blog 3",
      //     description:
      //       "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet modinon ration",
      //   },
      //   {
      //     id: 4,
      //     title: "this is Blog 4",
      //     description:
      //       "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet modinon ration",
      //   },
      //   {
      //     id: 5,
      //     title: "this is Blog 5",
      //     description:
      //       "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet modinon ration",
      //   },
      // ],
      // blog_details: {
      //   title: "",
      //   description: "",
      // },
      // comments: [
      //   {
      //     id:1,
      //     blog_id: 1,
      //     name: "sulaiman",
      //     description: "Lorem ipsum",
      //   },
      //   {
      //     id:2,
      //     blog_id: 2,
      //     name: "sule",
      //     description: "Lorem ipsum",
      //   },
      //   {
      //     id:3,
      //     blog_id: 3,
      //     name: "sul",
      //     description: "Lorem ipsum",
      //   },
      //   {
      //     id:4,
      //     blog_id: 4,
      //     name: "sulma",
      //     description: "Lorem ipsum",
      //   },
      //   {
      //     id:5,
      //     blog_id: 5,
      //     name: "suliman",
      //     description: "Lorem ipsum",
      //   },
      // ],
      // selected_comments: [],
    };
  },
  methods: {
    ...mapActions([
      'fetch_blog_details',
    ]),
    // get_blog_details: function(blog){
    //   this.blog_details = blog;
    //   this.get_comments(blog.id);
    // },
    // get_comments: function(blog_id){
    //   this.selected_comments = this.comments.filter((item)=>item.blog_id === blog_id);
    // },
    // post_comment: function(comment){
    //   comment.id = this.comments.length + 1;
    //   this.comments.unshift(comment);
    //   this.get_comments(comment.blog_id);
    // }
  },
  computed: {
    ...mapGetters([
      'get_blog_lists',
    ]),
  }
};
</script>

<style>
</style>