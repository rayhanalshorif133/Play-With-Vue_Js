<template>
  <div>
    {{ title }} 
    <h3>message : {{new_message}}</h3>
    <br>
    <App2 :message="new_message"/>
  </div>
</template>

<script>
import App2 from "./App2.vue";
export default {
  components: {
    App2,
  },
  props: {
    message: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
        new_message: ''
    };
  },
  watch: {
    message(newVal) {
      this.new_message = newVal;
    }
  }
};
</script>

<style></style>
