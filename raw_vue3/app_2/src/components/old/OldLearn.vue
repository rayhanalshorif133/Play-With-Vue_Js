<template>
  <div>
    <Header title="Old Learn" />
    <div class="text-center mx-auto justify-center mt-10">
      <div v-show="showOld">
        <!-- if ese -->
        <h1 v-if="isTrue" v-html="title"></h1>
        <h3 v-else>Not Found</h3>
        <!-- v show -->
        <h2 v-show="isShow">Welcome to Your Vue.js App</h2>

        <!-- do something (count) -->

        <h4 v-show="isShow" class="text-2xl font-semibold" v-text="count"></h4>

        <!-- For Loop -->
        <ul>
          <li v-for="item in 10" :key="item" class="text-2xl">{{ item }}</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import Header from "../Header.vue";
export default {
  components: {
    Header,
  },
  data() {
    return {
      title: "<h2>Welcome to h2</h2>",
      showOld: true,
      isTrue: true,
      isShow: true,
      count: 0,
    };
  },
  mounted() {
    setInterval(() => {
      this.count++;
    }, 1000);
  },
};
</script>

<style></style>
