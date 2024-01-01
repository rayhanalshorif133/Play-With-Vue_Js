<template>
  <div>
    Form app 2
    {{ title }}
    <App3 :message="message"/>
  </div>
</template>

<script>
import App3 from "./App3.vue";
export default {
  components: {
    App3,
  },
  props: {
    message: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      title: "",
    };
  },
  watch: {
    message(newVal) {
      this.title = newVal;
    },
  },
};
</script>

<style></style>
