<template>
  <div class="min-h-screen flex justify-center items-center">
    <App1 :message="message" />
    <br />
    <div class="border border-gray-400 p-10 m-10">
      <h1 class="bg-gray-200">{{ message }}</h1>
      <h1>Change Message</h1>
      <input
        type="text"
        class="border border-gray-400"
        v-model="message"
        placeholder="Change Msg"
      />
    </div>

    <div>
      <label for="fruit">Select a fruit:</label>
      <select id="fruit" v-model="selectedFruit">
        <option value="apple">Apple</option>
        <option value="banana">Banana</option>
        <option value="orange">Orange</option>
      </select>

      <ChildComponent :selectedFruit="selectedFruit" />
    </div>
  </div>
</template>

<script>
import App1 from "./_props_drilling/App1.vue";
import ChildComponent from './ChildComponent.vue';
export default {
  components: {
    App1,ChildComponent
  },
  data() {
    return {
      message: "",
      selectedFruit: "",
    };
  },
};
</script>

<style></style>
