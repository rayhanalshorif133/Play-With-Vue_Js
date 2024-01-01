<template>
  <div class="bg-[#F3F4F6] min-h-screen">
    <Header title="Food" />
    <div class="px-5 py-5 bg-white shadow-xl w-fit rounded-lg mt-6 mx-auto justify-center">
      <h1 class="text-2xl font-bold mx-auto justify-center text-center">
        List of Food
      </h1>
      <div class="mx-auto justify-center flex">
        <table class="border border-gray-400 mt-6">
          <thead class="border border-gray-400">
            <tr class="border border-gray-400">
              <th class="border border-gray-400 px-5">Food Name</th>
              <th class="border border-gray-400 px-5">Food Description</th>
              <th class="border border-gray-400 px-5">Is Favorite</th>
              <th class="border border-gray-400 px-5">Actions</th>
            </tr>
          </thead>
          <tbody>
            <food-item
              v-for="item in foodItems"
              :key="item"
              :food-details="item"
              @toggle-favorite="receiveEmit"
            />
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import Header from "./Header.vue";
import FoodItem from "./_partials/FoodItem.vue";
export default {
  components: {
    Header,
    FoodItem,
  },
  data() {
    return {
      foodItems: [
        {
          id: 1,
          name: "Apples",
          desc: "Apples are red",
          isFavorite: true,
        },
        {
          id: 2,
          name: "Oranges",
          desc: "Oranges are orange",
          isFavorite: false,
        },
        {
          id: 3,
          name: "Bananas",
          desc: "Bananas are yellow",
          isFavorite: true,
        },
        {
          id: 4,
          name: "Rice",
          desc: "Rice is white",
          isFavorite: false,
        },
        {
          id: 5,
          name: "Bread",
          desc: "Bread is brown",
          isFavorite: true,
        },
      ],
    };
  },
  methods: {
    toggleFavorite() {
      this.$emit("toggle-Favorite");
    },
    receiveEmit(foodItem) {
      const { id } = foodItem;
      var findFood = this.foodItems.find((item) => item.id === id);
      findFood.isFavorite = !findFood.isFavorite;
    },
  },
};
</script>

<style></style>
