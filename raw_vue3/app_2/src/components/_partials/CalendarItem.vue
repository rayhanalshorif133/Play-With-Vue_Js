<template>
  <div class="mx-auto justify-center">
    <table
      class="border border-gray-300 justify-center mx-auto w-fit text-center mt-6"
    >
      <tr>
        <th colspan="7" class="bg-green-900 py-2 text-base text-white">
          {{ month }}
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
      <tr v-for="(col, col_index) in 5" :key="col_index" v-once>
        <td
          class="border border-gray-300"
          v-for="(item, item_index) in 7"
          :key="item_index"
          v-once
        >
          <span v-if="return_value <= totalDays()">
            <span v-if="col_index == 0 && item_index > 2">
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
    }
  },
  mounted() {
    this.totalDays();
  },
  data() {
    return {
      days: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      months : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
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
      this.total_days = this.getDaysInMonth(this.month, this.year);
      return this.total_days;
    },
  },
};
</script>

<style></style>
