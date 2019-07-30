<template>
  <div>
    <input v-if="checked == '1'" type="radio" name="calendar[id]" :value="id" checked required="true" :id="id" />
    <input v-else type="radio" name="calendar[id]" :value="id" required="true" :id="id" />
    <label :for="id" :style="color">{{summary}}</label>
  </div>
</template>

<script>
  export default {
    props: {
      checked: String,
      id: String,
      color: String,
      summary: String,
    },
  }
</script>