<template>
  <div class="crud">
    <div class="col-1">
      <img :src="image"/>
    </div>
    <div class="col-2">
      <h3>Name: {{ name | properCase }}</h3>
      <select @change="update">
        <option
          v-for="col in [ 'red', 'green' ]"
          :value="col"
          :key="col"
          :selected="col === color ? 'selected' : ''"
        >{{ col | properCase }}</option>
      </select>
      <button @click="del">Delete</button>
    </div>
  </div>
</template>

<script>

  function Crud({ id, color, name}) {
    this.id = id;
    this.color = color;
    this.name = name;
  }

import CrudComponent from './CrudComponent.vue';

  export default {
    data() {
      return {
        cruds: []
      }
    },
    methods: {
      create() {
       
      },
      read() {
          window.axios.get('/api/cruds').then(({ data }) => {
            data.forEach(crud => {
            this.cruds.push(new Crud(crud));
        });
      },
      update(id, color) {
       
      },
      del(id) {
       
      }
    },
    components: {
      CrudComponent
    }
  }

  </script>