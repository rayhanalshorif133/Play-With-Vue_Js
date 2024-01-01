<template>
  <div>
    
      <!-- <OldLearn /> -->
      <!-- <UserList /> -->
      <!-- <Calendar /> -->
      <!-- <PropsDrillingPractice /> -->
      <Food/>
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import OldLearn from "./components/old/OldLearn.vue";
import UserList from "./components/UserList.vue";
import Calendar from "./components/old/Calendar.vue";
import PropsDrillingPractice from "./components/old/PropsDrillingPractice.vue";
import Food from "./components/Food.vue";
export default {

  components: {
    Header,OldLearn,UserList,Calendar,PropsDrillingPractice,Food
  },
  

};
</script>

<style></style>
