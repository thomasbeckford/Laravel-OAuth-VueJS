
<template>
    <div class="container" style="text-align:center" >
      <div class="row">
        <div class="col-md-12">
           <h2 style="font-size: 50px">Login</h2>
            <div class="wrapper fadeInDown">
              <div id="formContent" style="padding:40px">
                <form @submit.prevent="handleSubmit">
                  <input type="text" id="email" class="fadeIn second" name="email" v-model="email" placeholder="User">
                  <input id="password" type="password" class="fadeIn third" name="password" v-model="password" placeholder="Password">
                  <input type="submit" class="fadeIn fourth" value="Log in" style="margin-top:20px">
                </form>
                  <router-link to="/register">Register</router-link>
              </div>
            </div>
        </div>
      </div>
    </div>
</template>



<script>

export default {
  data: function() {
    return {
      email:"",
      password: ""
    };
  },
  mounted(){
    console.log("mounted")
  },

  methods:{
      handleSubmit:function(e){
          e.preventDefault();
          const self = this;
          let body = { email: this.email, password: this.password, remember_me: true }
          let headers = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
          axios.post('/api/auth/login', body, { headers: headers })
          .then(function (response) {
            console.log(response)
            self.$cookie.set("access_token", response.data.access_token, "111");
            self.$cookie.set("user_id", response.data.user_id.id, "111");
            self.$router.push('books')
          })
          .catch(function (error) {
            console.log(error)
          });
      }
  }
};
</script>

