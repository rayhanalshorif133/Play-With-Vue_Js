<template>
  <div>
    <Header title="Calendar" />
    <div class="text-center mx-auto justify-center mt-10 space-x-3">
      <h3
        class="m-auto text-2xl font-medium text-green-100 w-fit bg-green-800 px-5 py-2"
      >
        Vue Calender
      </h3>
      <section class="mt-6 flex space-x-10 justify-center">
        <p class="text-xl font-semibold text-stone-800" v-for="(item,index) in days" :key="index">{{item}}</p>
      </section>
      <section class="mt-6 flex flex-wrap space-x-10 justify-center">
        <p class="text-xl font-semibold text-stone-800" v-for="(item,index) in 30" :key="index">{{item}}</p>
      </section>
    </div>
  </div>
</template>

<script>
import Header from "./Header.vue";
export default {
  components: {
    Header,
  },
  data() {
    return {
      days: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    };
  },
};
</script>

<style></style>
