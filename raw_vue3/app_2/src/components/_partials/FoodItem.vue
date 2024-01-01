<template>
  <tr class="border border-gray-400">
    <td class="border border-gray-400 px-5">{{ foodDetails.name }}</td>
    <td class="border border-gray-400 px-5">{{foodDetails.desc}}</td>
    <td class="border border-gray-400 px-5">{{foodDetails.isFavorite}}</td>
    <td class="border border-gray-400 px-5">
      <button class="bg-green-600 text-white px-6 py-1" @click="setFavData">Favorite</button>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["foodDetails"],
  data() {
    return {};
  },
  methods: {
    setFavData() {
      this.$emit("toggle-favorite", this.foodDetails);
    },
  },
};
</script>

<style></style>
