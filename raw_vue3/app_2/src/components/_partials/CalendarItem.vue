<template>
  <div class="mx-auto justify-center">
    <table
      class="border border-gray-300 justify-center mx-auto w-fit text-center mt-6"
    >
      <tr>
        <th colspan="7" :class="`${headerBgColor()} py-2 text-base text-white`">
          {{ month.item }}
        </th>
      </tr>
      <tr>
        <th
          v-for="(day, index) in days"
          :key="index"
          class="px-5 border border-gray-300"
        >
          {{ day }}
        </th>
      </tr>
      <tr v-for="(col, col_index) in 6" :key="col_index" v-once>
        <td 
          class="border border-gray-300"
          v-for="(item, item_index) in 7"
          :key="item_index"
          v-once
        >
          <span v-if="return_value <= totalDays()">
            <span v-if="col_index == 0 && item_index > SET_GAP()">
              {{ return_value++ }}
            </span>
            <span v-else-if="col_index > 0">{{ return_value++ }}</span>
          </span>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    month: {
      type: String,
      required: true,
    },
    year:{
      type: String,
      required: true,
    },
  },
  mounted() {
    this.totalDays();
    console.log(this.year);
  },
  data() {
    return {
      days: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      months : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
      bgColors: ["bg-red-600", "bg-green-800", "bg-blue-600", "bg-yellow-600", "bg-cyan-600", "bg-pink-600"],
      total_days: 1,
      return_value: 1,
    };
  },
  methods: {
    getDaysInMonth(month, year) {
      const GET_MONTH = this.months.indexOf(month) + 1;
      const days = new Date(year, GET_MONTH, 0).getDate();
      return days;
    },
    totalDays() {
      console.log(this.month.item, this.year.year);
      this.total_days = this.getDaysInMonth(this.month.item, this.year.year);
      return this.total_days;
    },
    headerBgColor() {
      return this.bgColors[Math.floor(Math.random() * this.bgColors.length)];
    },
    SET_GAP(){
      const GET_MONTH = this.months.indexOf(this.month.item) + 1;
      const GET_DAY = new Date(`${this.year.year}-${GET_MONTH}-01`).getDay() -1;
      return GET_DAY;
    }
  },
};
</script>

<style></style>
