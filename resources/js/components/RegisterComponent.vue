
<template>
    <div class="container" style="text-align:center" >
      <div class="row">
        <div class="col-md-12">
           <h2 style="font-size: 50px">Register</h2>
            <div class="wrapper fadeInDown">
              <div id="formContent" style="padding:40px">
                <form @submit.prevent="handleSubmit">
                  <input type="text" id="name" class="fadeIn second" name="name" v-model="name" placeholder="Name">
                  <input type="email" class="fadeIn third" name="email" v-model="email" placeholder="Email">
                  <input type="password" class="fadeIn third" id="password" name="password" v-model="password" placeholder="Password">
                  <input type="password" class="fadeIn third" id="password_confirmation" name="password_confirmation" v-model="password_confirmation" placeholder="Password Confirmation">
                  <input type="submit" class="fadeIn fourth" value="Register" style="margin-top:20px">
                </form>
                <router-link className="fadeIn fourth" to="/">Login</router-link>
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
      name:"",
      email:"",
      password: "",
      password_confirmation: ""
    };
  },
  methods:{
      handleSubmit:function(e){
          e.preventDefault();
          let body = { 
            name: this.name,
            email:this.email, 
            password:this.password, 
            password_confirmation: this.password_confirmation
          }
          let headers = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
          axios.post('/api/auth/signup', body, { headers: headers })
          .then(function (response) {
              
          })
          .catch(function (error) {
              console.log(error)
          });
      }
  }
};
</script>

