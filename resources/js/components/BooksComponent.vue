<template>
  <div>
    <div style="border: 1px solid lightgrey">
     <form @submit.prevent="handleAll">
      <input type="submit" class="fadeIn fourth" value="Get all books" style="margin-top:20px">
    </form>
    </div>
    <div style="border: 1px solid lightgrey">
     <form @submit.prevent="handleFind">
      <input type="text" class="fadeIn" v-model="id_find"  placeholder="ID" style="margin-top:20px">
      <input type="submit" class="fadeIn fourth" value="Find by id" style="margin-top:20px">
    </form>
    </div>
    <div style="border: 1px solid lightgrey">
     <form @submit.prevent="handleStore">
      <input type="text" class="fadeIn" placeholder="Title" v-model="title" style="margin-top:20px">
      <input type="text" class="fadeIn" placeholder="Body" v-model="body" style="margin-top:20px">
      <input type="submit" class="fadeIn fourth" value="Create" style="margin-top:20px">
    </form>
    </div>
    <div style="border: 1px solid lightgrey">
     <form @submit.prevent="handleUpdate">
      <input type="text" class="fadeIn" placeholder="Title" style="margin-top:20px">
      <input type="text" class="fadeIn" placeholder="Body" style="margin-top:20px">
      <input type="submit" class="fadeIn fourth" value="Update" style="margin-top:20px">
    </form>
    </div>
    <div style="border: 1px solid lightgrey">
     <form @submit.prevent="handleDelete">
      <input type="text" class="fadeIn" placeholder="id for delete" v-model="id_delete" style="margin-top:20px">
      <input type="submit" class="fadeIn fourth" value="Delete by id" style="margin-top:20px">
    </form>
   </div>
  </div>
</template>

<script>


import CrudComponent from './CrudComponent.vue';

  export default {
  data: function() {
    return {
      id_delete:"",
      title:"",
      body: "",
      id_find:""
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
<<<<<<< HEAD
          axios.delete(`/api/auth/books/${this.id_delete}`, { headers: headers })
=======
          axios.delete(`/api/auth/books/${this.id}`, { headers: headers })
>>>>>>> 2e52ccf81407685f94c9ff3331f220a3dca39e94
          .then(function (response) {
            console.log(response)
          })
          .catch(function (error) {
            console.log(error)
          });
      },
      handleUpdate:function(e){

      },
      handleAll:function(e){
          e.preventDefault();
          const self = this;
          let headers = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization': 'Bearer '+this.$cookie.get('access_token') }
          axios.get('/api/auth/books', { headers: headers })
          .then(function (response) {
            return results = response.data;
          })
          .catch(function (error) {
            console.log(error)
          });
      },
      handleFind:function(e){
          e.preventDefault();
          const self = this;
          let body = {
            user_id: this.$cookie.get('user_id')
          }
          let headers = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization': 'Bearer '+this.$cookie.get('access_token') }
          axios.get(`/api/auth/books/${this.id_find}`, { headers: headers })
          .then(function (response) {
            console.log(response)
          })
          .catch(function (error) {
            console.log(error)
          });        
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
