<template>
  <div class="crud">

  </div>
</template>

<script>


import CrudComponent from './CrudComponent.vue';

  export default {
  
  mounted(){
    console.log("books");
    if(!this.$cookie.get('access_token'))
      this.$router.push('/')
  }

  }
  
  methods: {


  }

  </script>