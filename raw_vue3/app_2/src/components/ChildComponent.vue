<template>
  <div>
    <p>Selected fruit in child component: {{ childSelectedFruit }}</p>
  </div>
</template>

<script>
export default {
  props: {
    selectedFruit: String,
  },
  data() {
    return {
      childSelectedFruit: "",
    };
  },
  watch: {
    selectedFruit(newVal) {
      // React to changes in the selectedFruit prop
      this.childSelectedFruit = newVal;
      console.log(
        "Selected fruit in child component:",
        this.childSelectedFruit
      );
      // You can perform additional actions here based on the new value
    },
  },
};
</script>
