<template>
  <div class="mb-20">
    <Header title="Calendar" />
    <div class="text-center mx-auto justify-center mt-10 space-x-3">
      <h3
        class="m-auto text-2xl font-medium text-green-100 w-fit bg-green-800 px-5 py-2"
      >
        Vue Calender
      </h3>
      <div class="grid grid-cols-3 gap-4">
        <CalendarItem month="Jan" year="2023" />
        <CalendarItem month="Feb" year="2023" />
        <CalendarItem month="Mar" year="2023" />
        <CalendarItem month="Apr" year="2023" />
        <CalendarItem month="May" year="2023" />
        <CalendarItem month="Jun" year="2023" />
        <CalendarItem month="Jul" year="2023" />
        <CalendarItem month="Aug" year="2023" />
        <CalendarItem month="Sep" year="2023" />
        <CalendarItem month="Oct" year="2023" />
        <CalendarItem month="Nov" year="2023" />
        <CalendarItem month="Dec" year="2023" />
      </div>
    </div>
  </div>
</template>

<script>
import Header from "./Header.vue";
import CalendarItem from "./_partials/CalendarItem.vue";
export default {
  components: {
    Header,
    CalendarItem,
  },
};
</script>

<style></style>
