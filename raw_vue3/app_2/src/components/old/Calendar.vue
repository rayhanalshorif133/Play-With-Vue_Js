<template>
  <div class="mb-20">
    <Header title="Calendar" />
    <div class="text-center mx-auto justify-center mt-10 space-x-3">
      <h3
        class="m-auto text-2xl font-medium text-green-100 w-fit bg-green-800 px-5 py-2"
      >
        Vue Calender
      </h3>
      <h4 class="m-auto text-center  justify-center mt-6">
        <span class="text-gray-800 bg-cyan-400 py-2 px-10 font-semibold">Year: {{ year }}</span> 
        <select class="w-auto bg-green-700 text-white py-2 px-3 outline-none" v-model="year" @change="handleYear">
          <option v-for="(item,index) in years" :key="index" :value="item">{{ item }}</option>
        </select>
      </h4>
      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <span v-for="(item,index) in months" :key="index" >
          <CalendarItem :month="item" :year="year" />
        </span>
      </div>
    </div>
  </div>
</template>

<script>

import Header from "../Header.vue";
import CalendarItem from "../_partials/CalendarItem.vue";
export default {
  components: {
    Header,
    CalendarItem,
  },
  data() {
    return {
      // months : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
      months : ["Jan"],
      year: "2024",
    };
  },
  methods: {
    handleYear(e) {
      this.year = e.target.value;
    },
  },
  computed: {
    years() {
      let currentYear = new Date().getFullYear() - 130;
      let years = [];
      for (let i = currentYear; i <= currentYear + 150; i++) {
        years.push(i);
      }
      return years;
    },
  },
};
</script>

<style></style>
