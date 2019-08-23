
<template>
    <div class="container" style="text-align:center" >
      <div class="row">
        <div class="col-md-12">
           <h2 style="font-size: 50px">Login</h2>
            <div class="wrapper fadeInDown">
              <div id="formContent" style="padding:40px">
                <form method="POST" action="{{}}">
                  <input type="text" id="name" class="fadeIn second" name="name" placeholder="User">
                  <input type="password" class="fadeIn third" name="password" placeholder="Password">
                  <input type="submit" class="fadeIn fourth" value="Log in" style="margin-top:20px">
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
</template>

<script>

  export default {
      mounted() {
        console.log('Component mounted.')
      }
  }

</script>

