<template>
  <div>
    
    <div style="border: 1px solid lightgrey; margin-bottom:5px;margin-top:30px;">
     <form @submit.prevent="handleAll">
      <input type="submit" class="fadeIn" value="Get all books" style="margin-top:20px">
    </form>
    <ul style="list-style-type: none;">
      <li v-for="(item,key, index) in allbooks">
        <div v-if="item.title">
          <span style="color: green;">ID: {{item.id}}</span>
          <span style="color: black;">TITLE: {{ item.title }}</span>
          <span style="color: blue">BODY: {{ item.body }}</span>
        </div>
      </li>
    </ul>
    </div>

    <div style="border: 1px solid lightgrey; margin-bottom:5px;">
     <form @submit.prevent="handleFind">
      <input type="text" class="fadeIn" v-model="id_find"  placeholder="ID" style="margin-top:20px">
      <input type="submit" class="fadeIn" value="Find by id" style="margin-top:20px">
    </form>
      <p style="margin-left:30px">{{ byidbooks.title }}</p>
      <p style="margin-left:30px">{{ byidbooks.body }}</p>
      <p v-if="!byidbooks.title" style="margin-left:30px">{{ not_found }}</p>
    </div>
    
    <div style="border: 1px solid lightgrey; margin-bottom:5px;">
     <form @submit.prevent="handleStore">
      <input type="text" class="fadeIn" placeholder="Title" v-model="title_store" style="margin-top:20px">
      <input type="text" class="fadeIn" placeholder="Body" v-model="body_store" style="margin-top:20px">
      <input type="submit" class="fadeIn" value="Create" style="margin-top:20px">
    </form>
    </div>

    <div style="border: 1px solid lightgrey; margin-bottom:5px;">
     <form @submit.prevent="handleUpdate">
      <input type="text" class="fadeIn" v-model="id_update"  placeholder="ID" style="margin-top:20px">
      <input type="text" class="fadeIn" v-model="title_update" placeholder="Title" style="margin-top:20px">
      <input type="text" class="fadeIn" v-model="body_update" placeholder="Body" style="margin-top:20px">
      <input type="submit" class="fadeIn" value="Update" style="margin-top:20px">
    </form>
    </div>

    <div style="border: 1px solid lightgrey">
     <form @submit.prevent="handleDelete">
      <input type="text" class="fadeIn" placeholder="Please insert book ID to delete." v-model="id_delete" style="margin-top:20px">
      <input type="submit" class="fadeIn" value="Delete by id" style="margin-top:20px">
    </form>
   </div>

  </div>
</template>

<script>


  export default {
  data: function() {
    return {
      id_delete:"",
      title:"",
      body: "",
      id_find:"",
      id_update:"",
      allbooks: {
       title: '',
       body: ''
      },
      byidbooks:"",
      title_store:"",
      body_store:"",
      title_update:"",
      body_update:"",
      not_found: ""

  }

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
          let headers = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization': 'Bearer '+this.$cookie.get('access_token') }
          axios.delete(`/api/auth/books/${this.id_delete}`, { headers: headers })

          .then(function (response) {
            console.log(response)
          })
          .catch(function (error) {
            console.log(error)
          });
      },
      handleUpdate:function(e){
          e.preventDefault();
          const self = this;

          let body = {
            title: this.title_update,
            body: this.body_update
          }

          let headers = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization': 'Bearer '+this.$cookie.get('access_token') }
          axios.put(`/api/auth/books/${this.id_update}`,body, { headers: headers })

          .then(function (response) {
            console.log(response)
          })
          .catch(function (error) {
            console.log(error)
          });
      },
      handleAll:function(e){
          e.preventDefault();
          const self = this;
          let headers = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'Authorization': 'Bearer '+this.$cookie.get('access_token') }
          axios.get('/api/auth/books', { headers: headers })
          .then(function (response) {
            console.log(response.data);
            self.allbooks = response.data;

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
            self.byidbooks = response.data;
            self.not_found = "Not found";
          })
          .catch(function (error) {
            console.log(error)
          });        
      },
      handleStore:function(e){
          e.preventDefault();
          const self = this;
          let body = {
            title: this.title_store,
            body: this.body_store
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
