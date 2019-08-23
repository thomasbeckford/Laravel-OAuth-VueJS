<template>
  <div class="">
   <form @submit.prevent="handleGetAll">
    <input type="submit" class="fadeIn fourth" value="Get all books" style="margin-top:20px">
  </form>
   <form @submit.prevent="handleFindById">
    <input type="text" class="fadeIn"  placeholder="ID" style="margin-top:20px">
    <input type="submit" class="fadeIn fourth" value="Find by id" style="margin-top:20px">
  </form>
   <form @submit.prevent="handleStore">
    <input type="text" class="fadeIn" placeholder="Title" v-model="title" style="margin-top:20px">
    <input type="text" class="fadeIn" placeholder="Body" v-model="body" style="margin-top:20px">
    <input type="submit" class="fadeIn fourth" value="Create" style="margin-top:20px">
  </form>
   <form @submit.prevent="handleUpdate">
    <input type="text" class="fadeIn" placeholder="Title" style="margin-top:20px">
    <input type="text" class="fadeIn" placeholder="Body" style="margin-top:20px">
    <input type="submit" class="fadeIn fourth" value="Find by id" style="margin-top:20px">
  </form>
   <form @submit.prevent="handleDelete">
    <input type="text" class="fadeIn" placeholder="id for delete" v-model="id" style="margin-top:20px">
    <input type="submit" class="fadeIn fourth" value="Delete by id" style="margin-top:20px">
  </form>
  </div>
</template>

<script>


import CrudComponent from './CrudComponent.vue';

  export default {
  data: function() {
    return {
      id:"",
      title:"",
      body: ""
    };
  },
  mounted(){
    console.log("books");
    if(!this.$cookie.get('access_token'))
      this.$router.push('/')
  },



  methods: {
      handleDelete:function(e){
          e.preventDefault();
          const self = this;
          let body = {
            user_id: this.$cookie.get('user_id')
          }
          let headers = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization': 'Bearer '+this.$cookie.get('access_token') }
          axios.delete(`/api/auth/books/${this.id}`, { headers: headers })
          .then(function (response) {
            console.log(response)
          })
          .catch(function (error) {
            console.log(error)
          });
      },
      handleUpdate:function(e){

      },
      handleGetAll:function(e){

      },
      handleStore:function(e){
          e.preventDefault();
          const self = this;
          let body = {
            title: this.title,
            body: this.body,
            user_id: this.$cookie.get('user_id')
          }
          console.log(this.$cookie.get('user_id'))
          let headers = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization': 'Bearer '+this.$cookie.get('access_token') }
          axios.post('/api/auth/books', body, { headers: headers })
          .then(function (response) {
            console.log(response)
          })
          .catch(function (error) {
            console.log(error)
          });
      },

  }
};
  </script>
